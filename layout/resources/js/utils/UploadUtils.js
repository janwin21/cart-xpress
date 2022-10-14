'use strict';

function UploadUtils(input, imageDisplayer) 
{

    this.input = input;
    this.imageDisplayer = imageDisplayer;

    this.setChange = () => {

        this.input.on('change', e =>{
            const file = e.target.files[0];
        
            let fileReader = new FileReader();
            fileReader.readAsDataURL(file);

            fileReader.onload = () => {
                this.imageDisplayer[0].setAttribute('src', fileReader.result);
            }
            
        })

        return this;

    };

    this.trigger = () => { this.input.click(); };

}