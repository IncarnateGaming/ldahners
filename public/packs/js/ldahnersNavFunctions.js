let incScrolling = false;
let incLastKnownScroll = 0;
class LdahnersNavFunctions{
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
                LdahnersNavFunctions.showTop();
            } else {
                LdahnersNavFunctions.hideTop();
            }
        }
        incLastKnownScroll = window.scrollY;
        LdahnersIncarnateReference.incarnateDelay(300).then(result =>{incScrolling=false});
    }
    static toTop(){
        window.scrollTo(0,0);
    }
}
window.addEventListener('scroll',LdahnersNavFunctions.changeNavOnScroll);
document.getElementById('topButton').addEventListener('click',LdahnersNavFunctions.toTop);
LdahnersNavFunctions.hideTop();
