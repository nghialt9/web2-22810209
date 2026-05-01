(function () {
    // Hàm phụ trợ để định dạng số thành chuỗi có độ dài tối thiểu, thêm số 0 vào đầu nếu cần
    const p  = v => String(v).padStart(2, '0');
    const p3 = v => String(v).padStart(3, '0');

    function tickClient() {
        const now = new Date();
        // Cập nhật phần tử có id 'browser-time' với thời gian hiện tại của trình duyệt, định dạng theo yêu cầu
        document.getElementById('browser-time').textContent =
            p(now.getDate())  + '/' + p(now.getMonth() + 1) + '/' + now.getFullYear() + ' ' +
            p(now.getHours()) + ':' + p(now.getMinutes())   + ':' + p(now.getSeconds()) + '.' +
            p3(now.getMilliseconds());
    }
    tickClient();
    setInterval(tickClient, 1);

    function tickServer() {
        // Gửi yêu cầu đến TIME_URL để lấy thời gian hiện tại của máy chủ và cập nhật vào phần tử có id 'server-time'
        fetch(window.TIME_URL)
            .then(r => r.json())
            .then(d => { document.getElementById('server-time').textContent = d.time; })
            .catch(() => {});
    }
    tickServer();
    setInterval(tickServer, 1000);
})();