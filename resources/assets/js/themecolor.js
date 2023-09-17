import {indexbar, vectormap, indexchart} from './index1'
// import {names} from './custom-1'
// modified code start
let lightPrimaryColor  = document.querySelector('#colorID')
lightPrimaryColor?.addEventListener('input', changePrimaryColor)

let darkPrimaryColorID  = document.querySelector('#darkPrimaryColorID')
darkPrimaryColorID?.addEventListener('input', darkPrimaryColor)

let myonoffswitchTransparent  = document.querySelector('#myonoffswitchTransparent')
myonoffswitchTransparent?.addEventListener('input', transparentPrimaryColor)

let transparentPrimaryColorID  = document.querySelector('#transparentPrimaryColorID')
transparentPrimaryColorID?.addEventListener('input', transparentPrimaryColor)

let transparentBgColorID  = document.querySelector('#transparentBgColorID')
transparentBgColorID?.addEventListener('input', transparentBgColor)

let transparentBgImgPrimaryColorID  = document.querySelector('#transparentBgImgPrimaryColorID')
transparentBgImgPrimaryColorID?.addEventListener('input', transparentBgImgPrimaryColor)

let bgImageFn = document.querySelectorAll('.bg-img');
bgImageFn.forEach((e,i)=>{
    e.addEventListener('click', function(el){
        bgImage(this);
    })
})
// modified code end
const handleThemeUpdate = (cssVars) => {
    const root = document.querySelector(':root');
    const keys = Object.keys(cssVars);
    keys.forEach(key => {
        root.style.setProperty(key, cssVars[key]);
    });
}

function dynamicPrimaryColor(primaryColor) {
    primaryColor.forEach((item) => {
        item.addEventListener('input', (e) => {
            const cssPropName = `--primary-${e.target.getAttribute('data-id')}`;
            const cssPropName1 = `--primary-${e.target.getAttribute('data-id1')}`;
            const cssPropName2 = `--primary-${e.target.getAttribute('data-id2')}`;
            const cssPropName7 = `--primary-${e.target.getAttribute('data-id7')}`;
            const cssPropName8 = `--darkprimary-${e.target.getAttribute('data-id8')}`;
            const cssPropName3 = `--dark-${e.target.getAttribute('data-id3')}`;
            const cssPropName4 = `--transparent-${e.target.getAttribute('data-id4')}`;
            const cssPropName5 = `--transparent-${e.target.getAttribute('data-id5')}`;
            const cssPropName6 = `--transparent-${e.target.getAttribute('data-id6')}`;
            const cssPropName9 = `--transparentprimary-${e.target.getAttribute('data-id9')}`;
            handleThemeUpdate({
                [cssPropName]: e.target.value,
                // 95 is used as the opacity 0.95  
                [cssPropName1]: e.target.value + 95,
                [cssPropName2]: e.target.value,
                [cssPropName3]: e.target.value,
                [cssPropName4]: e.target.value,
                [cssPropName5]: e.target.value,
                [cssPropName6]: e.target.value + 95,
                [cssPropName7]: e.target.value + 20,
                [cssPropName8]: e.target.value + 20,
                [cssPropName9]: e.target.value + 20,
            });
        });
    });
}

(function() {
    
	'use strict'
    // Light theme color picker
    const LightThemeSwitchers = document.querySelectorAll('.light-theme .switch_section span');
    const dynamicPrimaryLight = document.querySelectorAll('input.color-primary-light');

    // themeSwitch(LightThemeSwitchers);
    dynamicPrimaryColor(dynamicPrimaryLight);

    // dark theme color picker

    const DarkThemeSwitchers = document.querySelectorAll('.dark-theme .switch_section span')
    const DarkDynamicPrimaryLight = document.querySelectorAll('input.color-primary-dark');

    // themeSwitch(DarkThemeSwitchers);
    dynamicPrimaryColor(DarkDynamicPrimaryLight);

    // tranparent theme color picker

    const transparentThemeSwitchers = document.querySelectorAll('.transparent-theme .switch_section span')
    const transparentDynamicPrimaryLight = document.querySelectorAll('input.color-primary-transparent');

    // themeSwitch(transparentThemeSwitchers);
    dynamicPrimaryColor(transparentDynamicPrimaryLight);

    // tranparent theme bgcolor picker

    const transparentBgThemeSwitchers = document.querySelectorAll('.transparent-theme .switch_section span')
    const transparentDynamicPBgLight = document.querySelectorAll('input.color-bg-transparent');

    // themeSwitch(transparentBgThemeSwitchers);
    dynamicPrimaryColor(transparentDynamicPBgLight);

    localStorageBackup();

    $('#myonoffswitch1').on('click', function(){
        document.querySelector('body')?.classList.remove('dark-theme');
        document.querySelector('body')?.classList.remove('transparent-theme');
        document.querySelector('body')?.classList.remove('bg-img1');
        document.querySelector('body')?.classList.remove('bg-img2');
        document.querySelector('body')?.classList.remove('bg-img3');
        document.querySelector('body')?.classList.remove('bg-img4');
        
        localStorage.removeItem('valexBgImage');
        $('#myonoffswitch1').prop('checked', true);
    })
    $('#myonoffswitch2').on('click', function(){
    document.querySelector('body')?.classList.remove('light-theme');
    document.querySelector('body')?.classList.remove('transparent-theme');
    document.querySelector('body')?.classList.remove('bg-img1');
    document.querySelector('body')?.classList.remove('bg-img2');
    document.querySelector('body')?.classList.remove('bg-img3');
    document.querySelector('body')?.classList.remove('bg-img4');
    
    localStorage.removeItem('valexBgImage');
    $('#myonoffswitch2').prop('checked', true);
    })
    $('#myonoffswitchTransparent').on('click', function(){
    document.querySelector('body')?.classList.remove('dark-theme');
    document.querySelector('body')?.classList.remove('light-theme');
    document.querySelector('body')?.classList.remove('bg-img1');
    document.querySelector('body')?.classList.remove('bg-img2');
    document.querySelector('body')?.classList.remove('bg-img3');
    document.querySelector('body')?.classList.remove('bg-img4');
    
    localStorage.removeItem('valexBgImage');
    $('#myonoffswitchTransparent').prop('checked', true);
    })
        
})();

function localStorageBackup() {
    
	'use strict'
    // if there is a value stored, update color picker and background color
    // Used to retrive the data from local storage
    if (localStorage.valexprimaryColor) {
        // document.getElementById('colorID').value = localStorage.valexprimaryColor;
        document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.valexprimaryColor);
        document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.valexprimaryHoverColor);
        document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.valexprimaryBorderColor);
        document.querySelector('html').style.setProperty('--primary-transparentcolor', localStorage.valexprimaryTransparent);
        // document.querySelector('body').setAttribute('class', 'app sidebar-mini light-theme');
        
        document.querySelector('body').classList.add('light-theme');
        document.querySelector('body').classList.remove('dark-theme');
        document.querySelector('body').classList.remove('transparent-theme');

        $('#myonoffswitch3').prop('checked', true);
        $('#myonoffswitch6').prop('checked', true);
        $('#myonoffswitch1').prop('checked', true);
    }

    if (localStorage.valexdarkPrimary) {
        // document.getElementById('darkPrimaryColorID').value = localStorage.valexdarkPrimary;
        document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.valexdarkPrimary);
        document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.valexdarkPrimary);
        document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.valexdarkPrimary);
        document.querySelector('html').style.setProperty('--dark-primary', localStorage.valexdarkPrimary);
        document.querySelector('html').style.setProperty('--darkprimary-transparentcolor', localStorage.valexdarkprimaryTransparent);
        // document.querySelector('body').setAttribute('class', 'app sidebar-mini dark-theme');
        
        document.querySelector('body').classList.remove('light-theme');
        document.querySelector('body').classList.add('dark-theme');
        document.querySelector('body').classList.remove('transparent-theme');

        $('#myonoffswitch2').prop('checked', true);

    }


    if (localStorage.valextransparentPrimary) {
        // document.getElementById('transparentPrimaryColorID').value = localStorage.valextransparentPrimary;
        document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.valextransparentPrimary);
        document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.valextransparentPrimary);
        document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.valextransparentPrimary);
        document.querySelector('html').style.setProperty('--transparent-primary', localStorage.valextransparentPrimary);
        document.querySelector('html').style.setProperty('--transparentprimary-transparentcolor', localStorage.valextransparentprimaryTransparent);
        // document.querySelector('body').setAttribute('class', 'app sidebar-mini transparent-theme');
        
        document.querySelector('body').classList.remove('light-theme');
        document.querySelector('body').classList.remove('dark-theme');
        document.querySelector('body').classList.add('transparent-theme');

        $('#myonoffswitchTransparent').prop('checked', true);
    }

    if (localStorage.valextransparentBgImgPrimary) {
		// document.getElementById('transparentBgImgPrimaryColorID').value = localStorage.valextransparentBgImgPrimary;
		document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.valextransparentBgImgPrimary);
		document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.valextransparentBgImgPrimary);
		document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.valextransparentBgImgPrimary);
		document.querySelector('html').style.setProperty('--transparent-primary', localStorage.valextransparentBgImgPrimary);
		document.querySelector('html').style.setProperty('--transparentprimary-transparentcolor', localStorage.valextransparentBgImgprimaryTransparent);
		document.querySelector('body')?.classList.add('transparent-theme');
		document.querySelector('body')?.classList.remove('dark-theme');
		document.querySelector('body')?.classList.remove('light-theme');
		
		$('#myonoffswitchTransparent').prop('checked', true);
	}
    
    if (localStorage.valextransparentBgColor) {
        // document.getElementById('transparentBgColorID').value = localStorage.valextransparentBgColor;
        document.querySelector('html').style.setProperty('--transparent-body', localStorage.valextransparentBgColor);
        document.querySelector('html').style.setProperty('--transparent-theme', localStorage.valextransparentThemeColor);
        document.querySelector('html').style.setProperty('--transparentprimary-transparentcolor', localStorage.valextransparentprimaryTransparent);
        document.querySelector('body').classList.add('transparent-theme');
        document.querySelector('body').classList.remove('dark-theme');
        document.querySelector('body').classList.remove('light-theme');


        $('#myonoffswitchTransparent').prop('checked', true);
    }
	if (localStorage.valexBgImage) {
		document.querySelector('body')?.classList.add('transparent-theme');
        let bgImg = localStorage.valexBgImage.split(' ')[0];
		document.querySelector('body')?.classList.add(bgImg);
		document.querySelector('body')?.classList.remove('dark-theme');
		document.querySelector('body')?.classList.remove('light-theme');
		
		$('#myonoffswitchTransparent').prop('checked', true);
	}

    if(localStorage.valexrtl) {
        document.querySelector('body').classList.add('rtl')
    }

    if(localStorage.valexhorizontal) {
        document.querySelector('body').classList.add('horizontal')
    }
    
    if(localStorage.valexhorizontalHover) {
        document.querySelector('body').classList.add('horizontal-hover')
    }
}

// triggers on changing the color picker
function changePrimaryColor() {
    
	'use strict'
    $('#myonoffswitch3').prop('checked', true);
    $('#myonoffswitch6').prop('checked', true);
    checkOptions();

    var userColor = document.getElementById('colorID').value;
    localStorage.setItem('valexprimaryColor', userColor);
    // to store value as opacity 0.95 we use 95
    localStorage.setItem('valexprimaryHoverColor', userColor + 95);
    localStorage.setItem('valexprimaryBorderColor', userColor);
    localStorage.setItem('valexprimaryTransparent', userColor + 20);

    // removing dark theme properties
    localStorage.removeItem('valexdarkPrimary')
    localStorage.removeItem('valextransparentBgColor');
    localStorage.removeItem('valextransparentThemeColor');
    localStorage.removeItem('valextransparentPrimary');
    localStorage.removeItem('valextransparentBgImgPrimary');
	localStorage.removeItem('valextransparentBgImgprimaryTransparent');
    localStorage.removeItem('valexdarkprimaryTransparent');
    document.querySelector('body').classList.add('light-theme');
    document.querySelector('body').classList.remove('transparent-theme');
    document.querySelector('body').classList.remove('dark-theme');
	localStorage.removeItem('valexBgImage');

    $('#myonoffswitch1').prop('checked', true);
    names()
}

function darkPrimaryColor() {
	'use strict'

    var userColor = document.getElementById('darkPrimaryColorID').value;
    localStorage.setItem('valexdarkPrimary', userColor);
    localStorage.setItem('valexdarkprimaryTransparent', userColor + 20);
    $('#myonoffswitch5').prop('checked', true);
    $('#myonoffswitch8').prop('checked', true);
    checkOptions();

    // removing light theme data 
    localStorage.removeItem('valexprimaryColor')
    localStorage.removeItem('valexprimaryHoverColor')
    localStorage.removeItem('valexprimaryBorderColor')
    localStorage.removeItem('valexprimaryTransparent');
    localStorage.removeItem('valextransparentBgImgPrimary');
	localStorage.removeItem('valextransparentBgImgprimaryTransparent');

    localStorage.removeItem('valextransparentBgColor');
    localStorage.removeItem('valextransparentThemeColor');
    localStorage.removeItem('valextransparentPrimary');
	localStorage.removeItem('valexBgImage');

    document.querySelector('body').classList.add('dark-theme');
    document.querySelector('body').classList.remove('light-theme');
    document.querySelector('body').classList.remove('transparent-theme');

    $('#myonoffswitch2').prop('checked', true);
    names()
}

function transparentPrimaryColor() {
	'use strict'
    
    $('#myonoffswitch3').prop('checked', false);
    $('#myonoffswitch6').prop('checked', false);
    $('#myonoffswitch5').prop('checked', false);
    $('#myonoffswitch8').prop('checked', false);

    var userColor = document.getElementById('transparentPrimaryColorID').value;
    localStorage.setItem('valextransparentPrimary', userColor);
    localStorage.setItem('valextransparentprimaryTransparent', userColor + 20);

    // removing light theme data 
    localStorage.removeItem('valexdarkPrimary');
    localStorage.removeItem('valexprimaryColor')
    localStorage.removeItem('valexprimaryHoverColor')
    localStorage.removeItem('valexprimaryBorderColor')
    localStorage.removeItem('valexprimaryTransparent');
    localStorage.removeItem('valextransparentBgImgPrimary');
	localStorage.removeItem('valextransparentBgImgprimaryTransparent');
    document.querySelector('body').classList.add('transparent-theme');
    document.querySelector('body').classList.remove('light-theme');
    document.querySelector('body').classList.remove('dark-theme');
	document.querySelector('body')?.classList.remove('bg-img1');
	document.querySelector('body')?.classList.remove('bg-img2');
	document.querySelector('body')?.classList.remove('bg-img3');
	document.querySelector('body')?.classList.remove('bg-img4');

    $('#myonoffswitchTransparent').prop('checked', true);
    checkOptions();
    names()
}

function transparentBgImgPrimaryColor() {
	'use strict'
    $('#myonoffswitch3').prop('checked', false);
    $('#myonoffswitch6').prop('checked', false);
    $('#myonoffswitch5').prop('checked', false);
    $('#myonoffswitch8').prop('checked', false);
	var userColor = document.getElementById('transparentBgImgPrimaryColorID').value;
	localStorage.setItem('valextransparentBgImgPrimary', userColor);
	localStorage.setItem('valextransparentBgImgprimaryTransparent', userColor+20);
	if(
		document.querySelector('body')?.classList.contains('bg-img1') == false &&
		document.querySelector('body')?.classList.contains('bg-img2') == false &&
		document.querySelector('body')?.classList.contains('bg-img3') == false &&
		document.querySelector('body')?.classList.contains('bg-img4') == false
		){
		document.querySelector('body')?.classList.add('bg-img1');
        localStorage.setItem('valexBgImage', 'bg-img1')
	}
    // removing light theme data 
	localStorage.removeItem('valexdarkPrimary');
	localStorage.removeItem('valexprimaryColor')
	localStorage.removeItem('valexprimaryHoverColor')
	localStorage.removeItem('valexprimaryBorderColor')
	localStorage.removeItem('valexprimaryTransparent');
	localStorage.removeItem('valexdarkprimaryTransparent');
	localStorage.removeItem('valextransparentPrimary')
	localStorage.removeItem('valextransparentprimaryTransparent');
	document.querySelector('body').classList.add('transparent-theme');
	document.querySelector('body')?.classList.remove('light-theme');
	document.querySelector('body')?.classList.remove('dark-theme');

	$('#myonoffswitchTransparent').prop('checked', true);
    checkOptions();
	names();
}


function transparentBgColor() {
	'use strict'
    $('#myonoffswitch3').prop('checked', false);
    $('#myonoffswitch6').prop('checked', false);
    $('#myonoffswitch5').prop('checked', false);
    $('#myonoffswitch8').prop('checked', false);
    var userColor = document.getElementById('transparentBgColorID').value;
    localStorage.setItem('valextransparentBgColor', userColor);
    localStorage.setItem('valextransparentThemeColor', userColor + 95);
    localStorage.setItem('valextransparentprimaryTransparent', userColor + 20);
    localStorage.removeItem('valextransparentBgImgPrimary');
	localStorage.removeItem('valextransparentBgImgprimaryTransparent');

    // removing light theme data 
    localStorage.removeItem('valexdarkPrimary');
    localStorage.removeItem('valexprimaryColor')
    localStorage.removeItem('valexprimaryHoverColor')
    localStorage.removeItem('valexprimaryBorderColor')
    localStorage.removeItem('valexprimaryTransparent');
	localStorage.removeItem('valexBgImage');
    document.querySelector('body').classList.add('transparent-theme');
    document.querySelector('body').classList.remove('light-theme');
    document.querySelector('body').classList.remove('dark-theme');
	document.querySelector('body')?.classList.remove('bg-img1');
	document.querySelector('body')?.classList.remove('bg-img2');
	document.querySelector('body')?.classList.remove('bg-img3');
	document.querySelector('body')?.classList.remove('bg-img4');

    $('#myonoffswitchTransparent').prop('checked', true);
    checkOptions();
}


function bgImage(e) {
	'use strict'

    $('#myonoffswitch3').prop('checked', false);
    $('#myonoffswitch6').prop('checked', false);
    $('#myonoffswitch5').prop('checked', false);
    $('#myonoffswitch8').prop('checked', false);
	let imgID = e.getAttribute('class');
	localStorage.setItem('valexBgImage', imgID);
    
    // removing light theme data 
	localStorage.removeItem('valexdarkPrimary');
	localStorage.removeItem('valexprimaryColor')
	localStorage.removeItem('valextransparentBgColor');
	localStorage.removeItem('valextransparentThemeColor');
	localStorage.removeItem('valextransparentprimaryTransparent');
	document.querySelector('body').classList.add('transparent-theme');
	document.querySelector('body')?.classList.remove('light-theme');
	document.querySelector('body')?.classList.remove('dark-theme');

	$('#myonoffswitchTransparent').prop('checked', true);
    checkOptions();
}

// to check the value is hexa or not
const isValidHex = (hexValue) => /^#([A-Fa-f0-9]{3,4}){1,2}$/.test(hexValue)

const getChunksFromString = (st, chunkSize) => st.match(new RegExp(`.{${chunkSize}}`, "g"))
    // convert hex value to 256
const convertHexUnitTo256 = (hexStr) => parseInt(hexStr.repeat(2 / hexStr.length), 16)
    // get alpha value is equla to 1 if there was no value is asigned to alpha in function
const getAlphafloat = (a, alpha) => {
        if (typeof a !== "undefined") { return a / 255 }
        if ((typeof alpha != "number") || alpha < 0 || alpha > 1) {
            return 1
        }
        return alpha
    }
    // convertion of hex code to rgba code 
function hexToRgba(hexValue, alpha) {
	'use strict'
    if (!isValidHex(hexValue)) { return null }
    const chunkSize = Math.floor((hexValue.length - 1) / 3)
    const hexArr = getChunksFromString(hexValue.slice(1), chunkSize)
    const [r, g, b, a] = hexArr.map(convertHexUnitTo256)
    return `rgba(${r}, ${g}, ${b}, ${getAlphafloat(a, alpha)})`
}


let myVarVal, myVarVal2, primaryColorVal, primaryHoverColorVal;

export function names() {
    
	'use strict'
    primaryColorVal = getComputedStyle(document.documentElement).getPropertyValue('--primary-bg-color').trim();
    primaryHoverColorVal = getComputedStyle(document.documentElement).getPropertyValue('--primary-bg-hover').trim();

    //get variable
    myVarVal = localStorage.getItem("valexprimaryColor") || localStorage.getItem("valexdarkPrimary") || localStorage.getItem("valextransparentPrimary") || localStorage.getItem("valextransparentBgImgPrimary")  || primaryColorVal;
    myVarVal2 = localStorage.getItem("valexprimaryHoverColor") || primaryHoverColorVal;
    
    if(document.querySelector('#bar') !== null){
        indexbar(myVarVal);
    }
    if(document.querySelector('#vmap12') !== null){
        vectormap(myVarVal, hexToRgba);
    } 
    if(document.querySelector('#chart') !== null){
        indexchart(myVarVal);
    }
    
    let colorData = hexToRgba(myVarVal || primaryColorVal, 0.1)
    document.querySelector('html').style.setProperty('--primary-1', colorData);

    let colorData1 = hexToRgba(myVarVal || primaryColorVal, 0.2)
    document.querySelector('html').style.setProperty('--primary-2', colorData1);

    let colorData2 = hexToRgba(myVarVal || primaryColorVal, 0.3)
    document.querySelector('html').style.setProperty('--primary-3', colorData2);

    let colorData3 = hexToRgba(myVarVal || primaryColorVal, 0.5)
    document.querySelector('html').style.setProperty('--primary-5', colorData3);

    let colorData4 = hexToRgba(myVarVal || primaryColorVal, 0.8)
    document.querySelector('html').style.setProperty('--primary-8', colorData4);
  
    
}
names()

// RESET SWITCHER TO DEFAULT
let reset = document.querySelector('#resetAll')
if(reset)
{reset.addEventListener('click', ()=>{
    resetData();
})}
let customreset = document.querySelector('#customresetAll')
if(customreset)
{customreset.addEventListener('click', ()=>{
    customresetData();
})}

function resetData() {
    
	$('#myonoffswitch3').prop('checked', true);
	$('#myonoffswitch1').prop('checked', true);
	$('#myonoffswitch6').prop('checked', true);
	$('#myonoffswitch9').prop('checked', true);
	$('#myonoffswitch11').prop('checked', true);
	$('#myonoffswitch13').prop('checked', true);
	$('#myonoffswitch07').prop('checked', true);
	$('#myonoffswitch03').prop('checked', true);
	$('body')?.removeClass('bg-img4');
	$('body')?.removeClass('bg-img1');
	$('body')?.removeClass('bg-img2');
	$('body')?.removeClass('bg-img3');
	$('body')?.removeClass('transparent-theme');
	$('body')?.removeClass('dark-theme');
	$('body')?.removeClass('dark-menu');
	$('body')?.removeClass('light-menu');
	$('body')?.removeClass('color-menu');
	$('body')?.removeClass('gradient-menu');
	$('body')?.removeClass('dark-header');
	$('body')?.removeClass('gradient-header');
	$('body')?.removeClass('light-header');
	$('body')?.removeClass('color-header');
	$('body')?.removeClass('layout-boxed');
	$('body')?.removeClass('icontext-menu');
	$('body')?.removeClass('sideicon-menu');
	$('body')?.removeClass('closed-menu');
	$('body')?.removeClass('hover-submenu');
	$('body')?.removeClass('hover-submenu1');
	$('body')?.removeClass('scrollable-layout');
	$('body')?.removeClass('sidenav-toggled');
	$('body')?.removeClass('leftbgimage1');
	$('body')?.removeClass('leftbgimage2');
	$('body')?.removeClass('leftbgimage3');
	$('body')?.removeClass('leftbgimage4');
	$('body')?.removeClass('leftbgimage5');
	$('body')?.removeClass('centerlogo-horizontal');

	$('body').removeClass('horizontal');
	$('body').removeClass('horizontal-hover');
	$(".main-content").removeClass("horizontal-content");
	$(".main-content").addClass("app-content");
	$(".main-container").removeClass("container");
	$(".main-container").addClass("container-fluid");
	$(".main-header").removeClass("hor-header");
	$(".main-header").addClass("side-header");
	$(".app-sidebar").removeClass("horizontal-main")
	$(".main-sidemenu").removeClass("container")
	$('#slide-left').removeClass('d-none');
	$('#slide-right').removeClass('d-none');
	$('body').addClass('sidebar-mini');
	if (document.querySelector('body').classList.contains('horizontal')) {
		checkHoriMenu();
        menuClick();
        responsive();
	}

	$('body').addClass('ltr');
	$('body').removeClass('rtl');
	$("html[lang=en]").attr("dir", "ltr");
	$(".select2-container").attr("dir", "ltr");
	$("head link#style").attr("href", $(this));
	(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.min.css"));
    (document.getElementById("style")?.setAttribute("href", "https://laravel8.spruko.com/valex/assets/plugins/bootstrap/css/bootstrap.min.css"));
	var carousel = $('.owl-carousel');
	$.each(carousel, function (index, element) {
		// element == this
		var carouselData = $(element).data('owl.carousel');
		carouselData.settings.rtl = false; //don't know if both are necessary
		carouselData.options.rtl = false;
		$(element).trigger('refresh.owl.carousel');
		if (document.querySelector('body').classList.contains('horizontal')) {
			checkHoriMenu();
		}
	});

    
	// localStorage.clear();
	// localStorage.setItem("valexvertical", true);

    // localStorage.clear();
	// localStorage.setItem("valexvertical", true);

    localStorage.clear();
    document.querySelector('html').style = '';
    names();
}

function customresetData() {
	'use strict'
	$('#myonoffswitch3').prop('checked', true);
	$('#myonoffswitch1').prop('checked', true);
	$('#myonoffswitch6').prop('checked', true);
	$('#myonoffswitch9').prop('checked', true);
	$('#myonoffswitch11').prop('checked', true);
	$('#myonoffswitch13').prop('checked', true);
	$('#myonoffswitch07').prop('checked', true);
	$('#myonoffswitch03').prop('checked', true);
	$('body')?.removeClass('bg-img4');
	$('body')?.removeClass('bg-img1');
	$('body')?.removeClass('bg-img2');
	$('body')?.removeClass('bg-img3');

	$('body').addClass('ltr');
	$('body').removeClass('rtl');
	$("html[lang=en]").attr("dir", "ltr");
	$(".select2-container").attr("dir", "ltr");
	localStorage.setItem("valexltr", true);
	localStorage.removeItem("valexrtl");
	$("head link#style").attr("href", $(this));
	(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.min.css"));
    (document.getElementById("style")?.setAttribute("href", "https://laravel8.spruko.com/valex/assets/plugins/bootstrap/css/bootstrap.min.css"));
	var carousel = $('.owl-carousel');
	$.each(carousel, function (index, element) {
		// element == this
		var carouselData = $(element).data('owl.carousel');
		carouselData.settings.rtl = false; //don't know if both are necessary
		carouselData.options.rtl = false;
		$(element).trigger('refresh.owl.carousel');
		if (document.querySelector('body').classList.contains('horizontal')) {
			checkHoriMenu();
		}
	});

    localStorage.clear();
	localStorage.setItem("valexrtl", true);

    localStorage.clear();
    document.querySelector('html').style = '';
    names();
}

// added "export" to the function modified line
export function checkOptions() {
	'use strict'

	// horizontal
	if (document.querySelector('body').classList.contains('horizontal')) {
		$('#myonoffswitch35').prop('checked', true);
	}

	// horizontal-hover
	if (document.querySelector('body').classList.contains('horizontal-hover')) {
		$('#myonoffswitch111').prop('checked', true);
	}

	//RTL 
	if (document.querySelector('body').classList.contains('rtl')) {
		$('#myonoffswitch55').prop('checked', true);
	}

	// light header 
	if (document.querySelector('body').classList.contains('light-header')) {
		$('#myonoffswitch6').prop('checked', true);
	}
	// color header 
	if (document.querySelector('body').classList.contains('color-header')) {
		$('#myonoffswitch7').prop('checked', true);
	}
	// gradient header 
	if (document.querySelector('body').classList.contains('gradient-header')) {
		$('#myonoffswitch26').prop('checked', true);
	}
	// dark header 
	if (document.querySelector('body').classList.contains('dark-header')) {
		$('#myonoffswitch8').prop('checked', true);
	}

	// light menu
	if (document.querySelector('body').classList.contains('light-menu')) {
		$('#myonoffswitch3').prop('checked', true);
	}
	// color menu
	if (document.querySelector('body').classList.contains('color-menu')) {
		$('#myonoffswitch4').prop('checked', true);
	}
	// gradient menu
	if (document.querySelector('body').classList.contains('gradient-menu')) {
		$('#myonoffswitch25').prop('checked', true);
	}
	// dark menu
	if (document.querySelector('body').classList.contains('dark-menu')) {
		$('#myonoffswitch5').prop('checked', true);
	}
}
checkOptions()