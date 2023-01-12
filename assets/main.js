const showMenu = (toggleId,navbarId,bodyId,headerId)=>{
    const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId),
    bodypadding = document.getElementById(bodyId),
    headerPadding = document.getElementById(headerId)

    if(toggle && navbar && bodypadding && headerPadding){
        toggle.addEventListener('click',()=>{
            navbar.classList.toggle('expander')
            bodypadding.classList.toggle('body-pd')
            headerPadding.classList.toggle('body-pd')
        })
    }
}
showMenu('header-toggle','navbar','body-pd','header')

// link
const linkColor = document.querySelectorAll('.nav__link')
function colorLink(){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
}
linkColor.forEach(l=> l.addEventListener('click',colorLink))
