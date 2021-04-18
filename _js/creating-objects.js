class Section {
    constructor(nameLinkMenu, element){
        this.element = $(element);
        this.jsElement = element; 
        this.isVisible = false;
        this.visibleOnce = false;
        this.nameLinkMenu = nameLinkMenu;

        Section.elementsArray.push(this);
        Section.elementsLength++;
    }
    
    fadeIn(time){
        if(!this.isVisible){
            this.element.fadeIn(time);
            this.isVisible = true;
            this.visibleOnce = true;
        }
    }

    fadeOut(time){
        if(this.isVisible){
            this.element.fadeOut(time);
            this.isVisible = false;
        }
    }

    static getAllElements(){
        return Section.elementsArray;
    }

    get getX() {
        return this.element.offset().top;
    }

    get getY() {
        return this.element.offset().left;
    }

    get getHeight() {
        return this.element.height();
    }

    get getWidth() {
        return this.element.width();
    }
}

Section.elementsArray = [];
Section.elementsLength = 0;

