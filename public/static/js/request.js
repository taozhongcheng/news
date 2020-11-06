//document.write("<script src='/static/js/utils.js'></script>");
function request(url, data, func, type = 'get') {
  $.ajax({
    type,
    url,
    dataType: 'json',
    data,
    beforSend: function () {
      // 禁用按钮防止重复提交
      // $("#submit").attr({ disabled: "disabled" });
    },
    error: function (res) {
      toast('服务器异常');
    },
    success: function (res) {
      if (res.code === 0){
        return toast(res.msg);
      }
      if (func) func(res);
    }
  });
}
