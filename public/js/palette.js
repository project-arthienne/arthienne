document.querySelectorAll("[data-palette]").forEach(palette=>{
const track = palette.querySelector(".palette-track")
const items = palette.querySelectorAll(".palette-item")
if(items.length === 0) return

let index = 0
const itemWidth = items[0].offsetWidth + 24
const max = items.length / 2

palette.querySelector(".palette-nav.right").onclick = ()=>{
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

palette.querySelector(".palette-nav.left").onclick = ()=>{
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
