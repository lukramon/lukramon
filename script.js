let toggleStatus = false;

document.querySelector('.sun').addEventListener('click', () => {
    document.querySelector('.wrapper').classList.toggle('is-switched');
    
    if(toggleStatus == false){
        document.documentElement.style.setProperty('--primary-color', '#070707');
        document.documentElement.style.setProperty('--secondary-color', '#f7f7f7');
        document.documentElement.style.setProperty('--logo-background', 'invert(100%)');
        document.documentElement.style.setProperty('--logo-front', 'invert(0%)');
        toggleStatus = true;
    }
    else{
        document.documentElement.style.setProperty('--primary-color', '#f7f7f7');
        document.documentElement.style.setProperty('--secondary-color', '#070707');
        document.documentElement.style.setProperty('--logo-background', 'invert(0%)');
        document.documentElement.style.setProperty('--logo-front', 'invert(100%)');
        toggleStatus = false;
    }
})
