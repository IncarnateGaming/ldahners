let incScrolling = false;
let incLastKnownScroll = 0;
class NavFunctions{
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
        incScrolling = true;
        const navbarSupportedContent = document.getElementById('navbarSupportedContent');
        if(navbarSupportedContent === undefined || navbarSupportedContent.classList.contains('show') !== true) {
            if (window.scrollY === 0) {
                document.getElementById('inc-top-html').classList.remove('hideNav');
            } else if (incLastKnownScroll < window.scrollY) {
                document.getElementById('inc-top-html').classList.add('hideNav');
            } else if (incLastKnownScroll > window.scrollY) {
                document.getElementById('inc-top-html').classList.remove('hideNav');
            }
            if (window.scrollY > 500) {
                NavFunctions.showTop();
            } else {
                NavFunctions.hideTop();
            }
        }
        incLastKnownScroll = window.scrollY;
        IncarnateReference.incarnateDelay(300).then(result =>{incScrolling=false});
    }
    static toTop(){
        window.scrollTo(0,0);
    }
}
window.addEventListener('scroll',NavFunctions.changeNavOnScroll);
document.getElementById('topButton').addEventListener('click',NavFunctions.toTop);
NavFunctions.hideTop();
