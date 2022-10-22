'use strict';

export default function FunctionUtils() 
{

    this.setComponent = component => {
        this.component = component;
        return this;
    };

    this.setClick = eventListener => {
        this.component.on('click', eventListener);
        return this;
    };

    this.setScroll = eventListener => {
        this.component.on('scroll', eventListener);
        return this;
    };

    this.setMouseOver = eventListener => {
        this.component.on('mouseover', eventListener);
        return this;
    };

    this.setMouseLeave = eventListener => {
        this.component.on('mouseleave', eventListener);
        return this;
    };
    
}