class LdahnersIncarnateReference{
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

    /**
     * Walks up the document tree looking for a certain tag
     * @param elem - starting DOM element
     * @param targetTag - String
     * @returns dom element found or false if failed to find
     */
    static getClosestTag (elem,targetTag){
        const lowerTag = targetTag.toLowerCase();
        while (elem.tagName.toLowerCase() != lowerTag && elem.tagName.toLowerCase() != 'html'){
            elem = elem.parentElement;
        }
        var result = false;
        if (elem.tagName.toLowerCase() == lowerTag) result = elem;
        return result;
    }
}
