

document.getEventListener('DOMContentLoaded', ()=>{
    console.log("dom loaded");
})

document.addEventListener('livewire:navigated', () => { 
    console.log('Navigated')
})