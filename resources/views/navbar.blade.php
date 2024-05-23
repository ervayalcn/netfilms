<div x-data="{ isOpen: window.innerWidth > 992}" x-init="() => { isOpen = window.innerWidth > 992; window.addEventListener('resize', () => { isOpen = window.innerWidth > 992; if (isOpen) { document.body.style.overflow = 'auto'; document.querySelector('.navbar').style.position = 'unset'; document.querySelector('.navbar').style.justifyContent = 'space-between';} else {document.querySelector('.navbar').style.position = 'fixed'; document.querySelector('.navbar').style.top = '0'; document.querySelector('.navbar').style.justifyContent = 'flex-start';} }); window.addEventListener('DOMContentLoaded', () => { isOpen = window.innerWidth > 992; if (isOpen) { document.body.style.overflow = 'auto'; document.querySelector('.navbar').style.position = 'unset'; document.querySelector('.navbar').style.justifyContent = 'space-between';} else {document.querySelector('.navbar').style.position = 'fixed'; document.querySelector('.navbar').style.top = '0'; document.querySelector('.navbar').style.justifyContent = 'flex-start';} }); }">

<div class="navbar" :class="{ 'd-none': !isOpen }" id="navbar_menu">
  <button @click="isOpen = false; document.body.style.overflow='auto'" class="navbar_close"><i class="fa-solid fa-x"></i></button>
        <div class="nav-logo">
            <div class="navbar-brand"><div class="icon"><i class="fa-solid fa-play"></i></div><div class="nav-links">NETFILMS</div></div>
        </div>
        <div class="nav-links">
            <a href="#">MOVIES</a>
            <a href="#">SERIES</a>
            <a href="#">KIDS</a>
        </div>
    </div>
    <div class="y-center">
    <button @click="isOpen = !isOpen; document.body.style.overflow = isOpen ? 'hidden' : 'auto' " class="navbar_bars" id="navbar_bars" :class="{ 'd-none': isOpen }"><i class="fa fa-bars"></i></button>
  </div>
</div>