import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.data("navigation",navigation);

Alpine.start();

function navigation(){
    return{
        navigations:[
            {name:"Anasayfa",link:"#home"},
            {name:"Hakkımda",link:"#about"},
            {name:"Projeler",link:"#portfolio"},
            {name:"Bana Ulaş",link:"#contact"},

        ],
        scrollBg: false,
        setScrollBg: function (value) {
            this.scrollBg = value;
        },
        changeNavBg: function () {
            window.addEventListener("scroll", () => {
                return window.scrollY > 50
                    ? this.setScrollBg(true)
                    : this.setScrollBg(false);
            });
        },
    }
}
