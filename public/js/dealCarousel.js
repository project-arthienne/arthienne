document.querySelectorAll('[data-deal-carousel]').forEach(carousel=>{
const track=carousel.querySelector('.deal-track')
const cards=carousel.querySelectorAll('.deal-card')
const cardWidth=cards[0].offsetWidth+32
let index=0

carousel.querySelector('.deal-arrow.right').onclick=()=>{
index++
if(index>cards.length-1) index=0
track.style.transform=`translateX(${-index*cardWidth}px)`
}

carousel.querySelector('.deal-arrow.left').onclick=()=>{
index--
if(index<0) index=cards.length-1
track.style.transform=`translateX(${-index*cardWidth}px)`
}
})
