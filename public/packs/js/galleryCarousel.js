class IncarnateGalleryCarousel{
    constructor(parentClass, itemClass) {
        this.name = parentClass + 'Carousel';
        this.parentClass = parentClass;
        this.itemClass = itemClass;
        const parents = document.getElementsByClassName(parentClass);
        var items = [];
        [].forEach.call(parents, parent=>{
            const newCollection = parent.getElementsByClassName(itemClass);
            items = items.concat(Array.from(newCollection));
        });
        this.items = items;
        this.carousel = this.buildCarousel(items);
    }
    buildCarousel(items){
        const carousel = document.createElement('div');
        carousel.setAttribute('id',this.name);
        carousel.setAttribute('class','carousel slide carousel-fade d-flex');
        const ol = document.createElement('ol');
        ol.setAttribute('class','carousel-indicators');
        const carouselInner = document.createElement('div');
        carouselInner.setAttribute('class','carousel-inner d-flex');
        const itemLength = this.items.length;
        for (var a=0; a<itemLength; a++){
            ol.innerHTML += `<li data-target="#${this.name}" data-slide-to="${a}"></li>`;
            carouselInner.innerHTML +=
                `<div class="carousel-item item" data-count="${this.items[a].getAttribute('data-count')}">
                        ${this.items[a].innerHTML}
                </div>`;
        }
        carousel.innerHTML += ol.outerHTML;
        carousel.innerHTML += carouselInner.outerHTML;
        carousel.innerHTML +=
            ` <a class="carousel-control-prev" href="#${this.name}" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#${this.name}" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>`;
        carousel.innerHTML += `<button class="close-carousel inc-text-light inc-bg-black">Close</button>`;
        return carousel;
    }

    /**
     * @param ev - the click event
     * @param carousel - the carousel built with the construct function
     * @param interval
     */
    static deploy(ev,incarnateGalleryCarousel,interval){
        interval = interval || 13000;
        IncarnateGalleryCarousel.currentY = window.scrollY;
        const item = IncarnateReference.getClosestClass(ev.target,incarnateGalleryCarousel.itemClass);
        const dataCount = item.getAttribute('data-count');
        const newCarousel = incarnateGalleryCarousel.carousel.cloneNode(true);
        const items = newCarousel.getElementsByClassName('carousel-item');
        const itemLength = items.length;
        for (var a=0;a<itemLength;a++){
            if(items[a].getAttribute('data-count')===dataCount){
                items[a].classList.add('active');
                break;
            }
        }
        const closeButton = newCarousel.getElementsByClassName('close-carousel')[0].addEventListener('click',IncarnateGalleryCarousel.closeCarousel);
        document.getElementsByTagName('body')[0].append(newCarousel);
        $('.carousel').carousel({interval:interval});
        document.getElementsByTagName('html')[0].classList.add('carousel-active');
    }
    static closeCarousel(ev){
        const carousel = IncarnateReference.getClosestClass(ev.target,'carousel');
        carousel.remove();
        document.getElementsByTagName('html')[0].classList.remove('carousel-active');
        window.scroll(0,IncarnateGalleryCarousel.currentY);
    }
}
IncarnateGalleryCarousel.currentY = 0;