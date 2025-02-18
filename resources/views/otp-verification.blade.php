<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-center text-2xl font-bold mb-4">Login</h2>

        <div id="messageBox" class="hidden p-3 mb-4 rounded-md text-white text-center"></div>

        <form id="otpForm">
            @csrf
            <div id="phoneSection">
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone" class="w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                <button type="button" id="sendOtpBtn" class="w-full bg-blue-500 text-white p-2 rounded-md mt-2 hover:bg-blue-600">
                    Send OTP
                </button>
            </div>

            <div id="otpSection" class="hidden mt-4">
                <label class="block text-sm font-medium text-gray-700">Enter OTP</label>
                <input type="text" id="otp" name="otp" class="w-full p-2 border rounded-md mb-2 focus:ring-green-500 focus:border-green-500">
                <button type="button" id="verifyOtpBtn" class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-600">Verify & Login</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('#sendOtpBtn').click(function () {
                let phone = $('#phone').val();
                $('#messageBox').hide();

                $.ajax({
                    url: "{{ route('send.otp') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        phone: phone
                    },
                    success: function (response) {
                        showMessage('OTP sent successfully!', 'bg-green-500');
                        $('#phoneSection').hide();
                        $('#otpSection').fadeIn();
                    },
                    error: function (xhr) {
                        showMessage(xhr.responseJSON.error || 'Something went wrong!', 'bg-red-500');
                    }
                });
            });

            $('#verifyOtpBtn').click(function () {
                let phone = $('#phone').val();
                let otp = $('#otp').val();
                $('#messageBox').hide();

                $.ajax({
                    url: "{{ route('verify.otp') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        phone: phone,
                        otp: otp
                    },
                    success: function (response) {
                        showMessage('Login successful! Redirecting...', 'bg-green-500');
                        setTimeout(() => window.location.href = response.redirect, 1000);
                    },
                    error: function (xhr) {
                        showMessage(xhr.responseJSON.error || 'Invalid OTP!', 'bg-red-500');
                    }
                });
            });

            function showMessage(message, bgColor) {
                $('#messageBox').text(message).removeClass('hidden bg-red-500 bg-green-500').addClass(bgColor).fadeIn();
            }
        });
    </script>
</body>
</html>
