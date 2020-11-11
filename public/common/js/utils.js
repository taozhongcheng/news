function toast(msg="操作成功！",time=1000){
  const DOM = document.getElementsByClassName('toast__html')[0]
  if (DOM) return
  const div = document.createElement("div");
  div.className = "toast__html";
  let html = "<div class='toast__html-content'>"+msg+"</div>"    
  div.innerHTML = html
  document.body.appendChild(div);
  const DOMS = document.getElementsByClassName('toast__html')[0]
  setTimeout(function(){
    document.body.removeChild(DOMS)
  },time)
}