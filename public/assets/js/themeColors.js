const handleThemeUpdate = (cssVars) => {
    const root = document.querySelector(':root');
    const keys = Object.keys(cssVars);
    keys.forEach(key => {
        root.style.setProperty(key, cssVars[key]);
    });
}

function dynamicPrimaryColor(primaryColor) {
    'use strict'
    
    primaryColor.forEach((item) => {
        item.addEventListener('input', (e) => {
            const cssPropName = `--primary-${e.target.getAttribute('data-id')}`;
            const cssPropName1 = `--primary-${e.target.getAttribute('data-id1')}`;
            const cssPropName2 = `--primary-${e.target.getAttribute('data-id2')}`;
            handleThemeUpdate({
                [cssPropName]: e.target.value,
                // 95 is used as the opacity 0.95  
                [cssPropName1]: e.target.value + 95,
                [cssPropName2]: e.target.value,
            });
        });
    });
}

$(function () {
    'use strict'

    // Light theme color picker (Left active for primary branding color updates only)
    const dynamicPrimaryLight = document.querySelectorAll('input.color-primary-light');
    dynamicPrimaryColor(dynamicPrimaryLight);

    localStorageBackup();
    checkOptions();
});

function localStorageBackup() {
    'use strict'
    
    // Force set Dark Mode states globally into local storage
    localStorage.setItem("zanexdarkMode", true);
    localStorage.removeItem("zanexlightMode");

    // Force add core Dark Mode template classes directly to layout components
    const bodyEl = document.querySelector('body');
    if (bodyEl) {
        bodyEl.classList.remove('light-mode', 'light-menu', 'light-header', 'color-menu', 'color-header', 'gradient-menu', 'gradient-header');
        bodyEl.classList.add('dark-mode', 'dark-menu', 'dark-header');
    }

    // Explicitly sync checkboxes to stay set on 'Dark' options
    $('#myonoffswitch7').prop('checked', true);  // Dark Mode Layout Switch
    $('#myonoffswitch10').prop('checked', true); // Dark Header Switch
    $('#myonoffswitch14').prop('checked', true); // Dark Menu Switch
    
    // Turn off Light Mode toggle element visually if they exist in sidebar
    $('#myonoffswitch6, #myonoffswitch8, #myonoffswitch12').prop('checked', false);

    // Apply custom branding accent primary color if available
    if (localStorage.zanexprimaryColor) {
        document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.zanexprimaryColor);
        document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.zanexprimaryHoverColor);
        document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.zanexprimaryBorderColor);
    }
    
    // Layout Width Structure Backups
    if(localStorage.zanexhorizontal){ bodyEl?.classList.add('horizontal'); }
    if(localStorage.zanexhorizontalHover){ bodyEl?.classList.add('horizontal-hover'); }
    if(localStorage.zanexrtl){ bodyEl?.classList.add('rtl'); }
    if(localStorage.zanexclosedmenu){
        bodyEl?.classList.add('closed-leftmenu');
        $("#myonoffswitch23").prop("checked", true);
    }
    if(localStorage.zanexicontextmenu){
        bodyEl?.classList.add('icontext-menu');
        $("#myonoffswitch22").prop("checked", true);
    }
    if(localStorage.zanexiconoverlay){
        bodyEl?.classList.add('icon-overlay');
        $("#myonoffswitch21").prop("checked", true);
    }
    if(localStorage.zanexhoversubmenu){
        bodyEl?.classList.add('hover-submenu');
        $("#myonoffswitch24").prop("checked", true);
    }
    if(localStorage.zanexhoversubmenu1){
        bodyEl?.classList.add('hover-submenu1');
        $("#myonoffswitch25").prop("checked", true);
    }
    if(localStorage.zanexboxedwidth){
        bodyEl?.classList.add('layout-boxed');
        $("#myonoffswitch17").prop("checked", true);
    }
    if(localStorage.zanexscrollable){
        bodyEl?.classList.add('scrollable-layout');
        $("#myonoffswitch19").prop("checked", true);
    }
}

function changePrimaryColor() {
    'use strict'
    var userColor = document.getElementById('colorID').value;
    localStorage.setItem('zanexprimaryColor', userColor);
    localStorage.setItem('zanexprimaryHoverColor', userColor + 95);
    localStorage.setItem('zanexprimaryBorderColor', userColor);
    names();
}

const isValidHex = (hexValue) => /^#([A-Fa-f0-9]{3,4}){1,2}$/.test(hexValue)
const getChunksFromString = (st, chunkSize) => st.match(new RegExp(`.{${chunkSize}}`, "g"))
const convertHexUnitTo256 = (hexStr) => parseInt(hexStr.repeat(2 / hexStr.length), 16)
const getAlphafloat = (a, alpha) => {
    if (typeof a !== "undefined") { return a / 255 }
    if ((typeof alpha != "number") || alpha < 0 || alpha > 1) {
        return 1
    }
    return alpha
}

function hexToRgba(hexValue, alpha) {
    if (!isValidHex(hexValue)) { return null }
    const chunkSize = Math.floor((hexValue.length - 1) / 3)
    const hexArr = getChunksFromString(hexValue.slice(1), chunkSize)
    const [r, g, b, a] = hexArr.map(convertHexUnitTo256)
    return `rgba(${r}, ${g}, ${b}, ${getAlphafloat(a, alpha)})`
}

let myVarVal, myVarVal1, myVarVal2, myVarVal3

function names() {
    'use strict'
    let primaryColorVal = getComputedStyle(document.documentElement).getPropertyValue('--primary-bg-color').trim();

    myVarVal = localStorage.getItem("zanexprimaryColor") || primaryColorVal;
    myVarVal1 = localStorage.getItem("zanexprimaryColor") || "#05c3fb";
    myVarVal2 = localStorage.getItem("zanexprimaryColor") || null;
    myVarVal3 = localStorage.getItem("zanexprimaryColor") || null;

    if(document.querySelector('#chartArea') !== null){ chartArea(); }
    if(document.querySelector('#recentorders') !== null){ recentOrders(); }
    
    let colorData = hexToRgba(myVarVal || "#6259ca", 0.1)
    document.querySelector('html').style.setProperty('--primary01', colorData);
    let colorData1 = hexToRgba(myVarVal || "#6259ca", 0.2)
    document.querySelector('html').style.setProperty('--primary02', colorData1);
    let colorData2 = hexToRgba(myVarVal || "#6259ca", 0.3)
    document.querySelector('html').style.setProperty('--primary03', colorData2);
    let colorData3 = hexToRgba(myVarVal || "#6259ca", 0.6)
    document.querySelector('html').style.setProperty('--primary06', colorData3);
    let colorData4 = hexToRgba(myVarVal || "#6259ca", 0.9)
    document.querySelector('html').style.setProperty('--primary09', colorData4);
}
names();