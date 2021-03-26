<li id="header_notification_bar" class="dropdown">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

        <i class="fa fa-bell-o"></i>
        <span class="badge bg-warning badge-count">0</span>
    </a>
    <ul class="dropdown-menu extended notification ">
        {{-- <li>
            <p>Notifications</p>
        </li> --}}



    </ul>
</li>

<script src="//js.pusher.com/3.1/pusher.min.js"></script>


<script type="text/javascript">
     var pusher = new Pusher('41c8e17473de2299e5d0', {
        encrypted: true,
cluster: "ap1"
});
var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
var counts = $('.badge-count').html();
var newNotificationHtml = `
<li>
            <div class="alert alert-success clearfix">

                <div class="noti-info">
                    <a href="http://localhost:8000/show/subcategory">`+data.message+` đã đặt hàng</a>
                </div>
            </div>
        </li>

`;

$('.notification').prepend(newNotificationHtml);
var countt = Number(counts);
countt +=1;
$('.badge-count').text(countt)
});
</script>
