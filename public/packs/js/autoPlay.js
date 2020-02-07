class IncarnateAutoplay{
    constructor(toggleClass) {
        this.autoplay = true;
        var items = [];
        const audio = document.getElementsByTagName('audio');
        items = items.concat(Array.from(audio));
        const video = document.getElementsByTagName('video');
        items = items.concat(Array.from(video));
        this.items = items;
        items.forEach(item=>{
            item.addEventListener('ended',this.endPlay);
            item.addEventListener('play',this.startPlay);
            item.loop = false;
        });
        const toggles = document.getElementsByClassName(toggleClass);
        [].forEach.call(toggles, toggle=>{
            toggle.addEventListener('click',this.toggleAutoplay);
        })
    }
    async startPlay(ev){
        var element = ev.target.getElementsByTagName('source')[0];
        element.classList.remove('playing');
        var playing = document.getElementsByClassName('playing');
        [].forEach.call(playing, item=>{
            const type = item.getAttribute('type');
            var player;
            if(type=='audio/mp3'){
                player = LdahnersIncarnateReference.getClosestTag(item,'audio')
            }else if(type=='video/mp4'){
                player = LdahnersIncarnateReference.getClosestTag(item,'video')
            }
            player.pause();
            item.classList.remove('playing');
        });
        element.classList.add('playing');
    }
    async endPlay(ev){
        if (incarnateAutoplay.autoplay){
            const element = ev.target.getElementsByTagName('source')[0];
            const source = element.getAttribute('src');
            const itemLen = incarnateAutoplay.items.length;
            for (var a=0; a<itemLen; a++){
                if(source === incarnateAutoplay.items[a].getElementsByTagName('source')[0].getAttribute('src')){
                    const nextElement = a < itemLen-1 ? a+1 : 0;
                    incarnateAutoplay.items[nextElement].play();
                    await LdahnersIncarnateReference.incarnateDelay(100);
                    incarnateAutoplay.items[a].pause();
                    break;
                }
            }
        }
    }
    toggleAutoplay(ev){
        if(incarnateAutoplay.autoplay){
            incarnateAutoplay.autoplay = false;
            ev.target.innerHTML = 'Turn Next Song Autoplay On';
        }else{
            incarnateAutoplay.autoplay = true;
            ev.target.innerHTML = 'Turn Next Song Autoplay Off';
        }
    }
}
const incarnateAutoplay = new IncarnateAutoplay('inc-autoplay-toggle');
