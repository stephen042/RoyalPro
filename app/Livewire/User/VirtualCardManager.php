<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Card;
use App\Models\User;
use App\Models\Notifications;
use App\Mail\AppMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class VirtualCardManager extends Component
{
    // Visibility status tracking
    public bool $has_card = false;
    public bool $card_status = false; // true = active, false = inactive
    public $user = null;

    // Virtual card data binding attributes
    public ?Card $userCard = null;

    // Form inputs
    public string $network = 'visa';
    public string $funding_source = 'balance';
    public float $generation_fee; // Default fee if not set

    // NEW: Binding attribute for the user card PIN definition
    public string $pin = '';

    /**
     * Component Lifecycle Mount hook execution
     */
    public function mount(): void
    {
        $this->user = Auth::user();
        $this->generation_fee = floatval($this->user->card_price ?? 250.00);
        $this->checkCardStatus();
    }

    /**
     * Live validation rules configuration pipeline hook
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'pin' => 'required|numeric|digits:4',
        ], [
            'pin.digits' => 'The secure card PIN execution criteria requires exactly 4 numeric digits.',
            'pin.numeric' => 'The card access PIN parameter can only contain numeric integers.',
        ]);
    }

    /**
     * Checks database constraints to map interface rules
     */
    public function checkCardStatus(): void
    {
        $user = Auth::user();
        $card = Card::where('user_id', $user->id)->first();

        if ($card) {
            $this->has_card = true;
            $this->card_status = (bool) $card->is_active;
            $this->userCard = $card;
        } else {
            $this->has_card = false;
            $this->card_status = false;
            $this->userCard = null;
        }
    }

    /**
     * Form execution pipeline handles buying/provisioning details
     */
    public function purchaseCard()
    {
        // Enforce validation constraints prior to processing balance updates
        $this->validate([
            'pin' => 'required|numeric|digits:4',
            'network' => 'required|string',
            'funding_source' => 'required|string',
        ]);

        $user_data = Auth::user();
        $full_name = $user_data->last_name . ' ' . $user_data->first_name;

        // Condition evaluation block: check dynamic source account balances
        $targetBalance = ($this->funding_source === 'balance') ? $user_data->balance : $user_data->sub_balance;

        if ($this->generation_fee > $targetBalance) {
            session()->flash('error', 'Insufficient Funds. Please fund your chosen account parameter wallet.');
            return;
        }

        // Generate mocked/demo card payload string variables cleanly
        $generatedCardPayload = [
            'number' => '4000' . rand(1000, 9999) . rand(1000, 9999) . rand(1000, 9999),
            'expiry' => '12/30',
            'cvv' => (string) rand(100, 999),
            'provider' => config('app.name'),
            'network' => $this->network,
            'funding_source' => $this->funding_source
        ];

        // Create Virtual Card record payload entry block incorporating user selection PIN directly
        $result = Card::create([
            'user_id' => $user_data->id,
            'is_active' => true,
            'paid_price' => $this->generation_fee,
            'pin' => $this->pin, // Assigned securely to your dedicated DB column
            'card_details' => $generatedCardPayload
        ]);

        if ($result) {
            // Deduct from wallet balance parameters dynamically matching logic context
            $balanceColumn = ($this->funding_source === 'balance') ? 'balance' : 'sub_balance';

            User::where("id", $user_data->id)->update([
                $balanceColumn => $targetBalance - $this->generation_fee,
            ]);

            // Dispatch application interface flash states and refresh variables
            session()->flash('success', 'Your Premium Virtual Card configuration has been provisioned successfully!');

            // Clean up form variables state
            $this->pin = '';
            $this->checkCardStatus();

            // Fire core notification dispatch routines
            Notifications::create([
                "user_id" => $user_data->id,
                "notifications_id" => Str::random(),
                "notifications_category" => "Virtual Card Generation",
                "notifications_message" => "Your " . strtoupper($this->network) . " Premium Card generation was processed at a fixed deduction of $" . $this->generation_fee . ".",
                "notifications_status" => "Active",
            ]);

            // Send operational notifications emails pipeline block
            $subject = "Premium Virtual Card Issued";
            $bodyUser = [
                "name" => $full_name,
                "title" => "Virtual Card Provisioning Service",
                "message" => "Hello $full_name. Your virtual item allocation transaction fee of $$this->generation_fee was completed successfully.<br><br><em>THANK YOU FOR TRADING WITH US</em>"
            ];
            $bodyAdmin = [
                "name" => "Admin",
                "title" => "System Virtual Card Request",
                "message" => "Hello Admin, $full_name has triggered payment and received an encrypted terminal card matching network variant code '" . strtoupper($this->network) . "' processing fee charged: $$this->generation_fee.",
            ];

            try {
                Mail::to($user_data->email)->send(new AppMail($subject, $bodyUser));
                Mail::to(config('app.Admin_email'))->send(new AppMail($subject, $bodyAdmin));
            } catch (\Throwable $th) {
                // Fail silently over logging stack variables securely
            }

            return;
        }

        session()->flash('error', 'An error occurred during verification loops. Please contact operational support panels.');
    }

    public function render()
    {
        return view('livewire.user.virtual-card-manager');
    }
}
