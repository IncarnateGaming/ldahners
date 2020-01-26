const htmlTop = document.getElementById('inc-top-html');
var incarnateVertical = true;
class IncarnateOrientation{
    static sequentialOreientationChange(){
        htmlTop.classList.add('mobile');
        IncarnateOrientation.orientationChange();
    }
    static async orientationChange(){
        await IncarnateReference.incarnateDelay(200);
        if(window.innerHeight > window.innerWidth){
            IncarnateOrientation.orientVertical();
        }else if(window.innerHeight < window.innerWidth){
            IncarnateOrientation.orientHorizontal();
        }
    }
    static orientHorizontal(){
        incarnateVertical = false;
    }
    static orientVertical(){
        incarnateVertical = true;
        htmlTop.classList.add('mobile');
    }
    static getBanners(){
        return document.getElementsByClassName('incarnate-policy-banner');
    }
}
window.addEventListener('orientationchange',IncarnateOrientation.sequentialOreientationChange);
window.addEventListener('resize',IncarnateOrientation.orientationChange);
IncarnateOrientation.orientationChange();
