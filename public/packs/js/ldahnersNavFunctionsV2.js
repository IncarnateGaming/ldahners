let incScrolling = false;
let incLastKnownScroll = 0;
class LdahnersNavFunctionsV2{
    static hideTop(){
        document.getElementById('topButton').style.display='none';
    }
    static showTop(){
        document.getElementById('topButton').style.display='inline-block';
    }
    static changeNavOnScroll(ev){
        if(incScrolling === true){
            return true;
        }
        console.log(window.scrollY);
        incScrolling = true;
        const navbarSupportedContent = document.getElementById('navbarSupportedContent');
        if(navbarSupportedContent === undefined || navbarSupportedContent.classList.contains('show') !== true) {
            if (window.scrollY === 0) {
                document.getElementById('inc-top-html').classList.remove('hideNav');
            } else if (incLastKnownScroll < window.scrollY && window.scrollY > 500) {
                document.getElementById('inc-top-html').classList.add('hideNav');
            } else if (incLastKnownScroll > window.scrollY) {
                document.getElementById('inc-top-html').classList.remove('hideNav');
            }
            if (window.scrollY > 500) {
                LdahnersNavFunctionsV2.showTop();
            } else {
                LdahnersNavFunctionsV2.hideTop();
            }
        }
        incLastKnownScroll = window.scrollY;
        LdahnersIncarnateReference.incarnateDelay(300).then(result =>{incScrolling=false});
    }
    static toTop(){
        window.scrollTo(0,0);
    }
}
window.addEventListener('scroll',LdahnersNavFunctionsV2.changeNavOnScroll);
document.getElementById('topButton').addEventListener('click',LdahnersNavFunctionsV2.toTop);
LdahnersNavFunctionsV2.hideTop();
