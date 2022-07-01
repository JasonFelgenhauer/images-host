const button = $('#burger_menu');
const menu = $('#menu');

if(button && menu){
    let enabled = true;

    button.on('click', () => {
        if(enabled){
            menu.animate({top: '10px'}, 500);
            enabled = false;
        }else{
            menu.animate({top: '-100%'}, 500);
            enabled = true;
        }
    })
}