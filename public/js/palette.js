document.querySelectorAll("[data-palette]").forEach(palette=>{
let index = 0
const track = palette.querySelector(".palette-track")
const items = palette.querySelectorAll(".palette-item")
const itemWidth = items[0].offsetWidth + 24
const max = items.length / 2

palette.querySelector(".palette-arrow.right").onclick = ()=>{
index++
track.style.transform = `translateX(${-index * itemWidth}px)`
if(index === max){
setTimeout(()=>{
track.style.transition = "none"
index = 0
track.style.transform = "translateX(0)"
setTimeout(()=>track.style.transition="transform .4s ease",50)
},400)
}
}

palette.querySelector(".palette-arrow.left").onclick = ()=>{
if(index === 0){
track.style.transition="none"
index = max
track.style.transform=`translateX(${-index*itemWidth}px)`
setTimeout(()=>{
track.style.transition="transform .4s ease"
index--
track.style.transform=`translateX(${-index*itemWidth}px)`
},50)
}else{
index--
track.style.transform=`translateX(${-index*itemWidth}px)`
}
}
})
