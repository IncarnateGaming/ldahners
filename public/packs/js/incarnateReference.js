class IncarnateReference{
    static incarnateDelay(ms){
        return new Promise(resolve => setTimeout(resolve, ms));
    }
    static getClosestClass (elem,targetClass){
        while (elem.classList.contains(targetClass) === false && elem.classList.contains("inc-top-html") === false){
            elem = elem.parentElement;
        }
        var result = false;
        if (elem.classList.contains(targetClass)) result = elem;
        return result;
    }
}
