'use strict';

function FunctionUtils() 
{

    this.setComponent = component => {
        this.component = component;
    };

    this.setClick = eventListener => {
        this.component.on('click', eventListener);
    } ;

    this.setScroll = eventListener => {
        this.component.on('scroll', eventListener);
    } ;

    this.setMouseOver = eventListener => {
        this.component.on('mouseover', eventListener);
    } ;

    this.setMouseLeave = eventListener => {
        this.component.on('mouseleave', eventListener);
    } ;
    
}