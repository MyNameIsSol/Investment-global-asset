
<script>
        function postDummy(url) {
            var form = $('form#dummy-form')
            form.attr('action', url)
            form.submit()
        }
    </script>

        <script>
        function joinTrade(url) {
            Swal.fire({
                title: 'Invest Trade',
                input: 'number',
                inputPlaceholder: 'Amount',
                showCancelButton: true,
                confirmButtonText: 'Invest',
                showLoaderOnConfirm: true,
                preConfirm: (amount) => {
                    formdata = new FormData();
                    formdata.set('_token', 'BPg0t41eImsLqbdnv9UKFGb5CZMqc5rFzl5vChEB')
                    formdata.set('amount', amount)
                    let resStatus = 200;
                    return fetch(url,
                        {
                            method: "POST",
                            headers: {
                                'Accept': 'application/json'
                            },
                            body: formdata
                        })
                        .then(async response => {
                            resStatus = response.status
                            if (!response.ok) {
                                if (response.status === 422) {
                                    let message = await response.json();
                                    if (message.hasOwnProperty('errors')) {
                                        throw new Error(message.errors.amount[0])
                                    }
                                }
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            console.log(error)
                            Swal.showValidationMessage(
                                `${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                            title: 'Successful!',
                            text: 'Trade invested successfully.',
                            type: 'success',
                            onClose: () => {
                                location.reload()
                            }
                        }
                    )
                }
            })
        }
    </script>
    <script>
            $('#warning1').on('click', function () {
                swal({
                    title: 'Sorry!',
                    text: "You need to make a deposit to proceed!",
                    type: 'warning',
                    padding: '2em'
                    })
                })
                $('#warning2').on('click', function () {
                swal({
                    title: 'Sorry!',
                    text: "You need to make a deposit to proceed!",
                    type: 'warning',
                    padding: '2em'
                    })
                })
                $('#warning3').on('click', function () {
                swal({
                    title: 'Sorry!',
                    text: "You need to make a deposit to proceed!",
                    type: 'warning',
                    padding: '2em'
                    })
                }) 
                $('#warning4').on('click', function () {
                swal({
                    title: 'Sorry!',
                    text: "You need to make a deposit to proceed!",
                    type: 'warning',
                    padding: '2em'
                    })
                }) 
                $('#warning5').on('click', function () {
                swal({
                    title: 'Sorry!',
                    text: "You need to make a deposit to proceed!",
                    type: 'warning',
                    padding: '2em'
                    })
                }) 
                $('#warning6').on('click', function () {
                swal({
                    title: 'Sorry!',
                    text: "You need to make a deposit to proceed!",
                    type: 'warning',
                    padding: '2em'
                    })
                })
                $('#warning7').on('click', function () {
                swal({
                    title: 'Sorry!',
                    text: "You need to make a deposit to proceed!",
                    type: 'warning',
                    padding: '2em'
                    })
                })
                $('#warning8').on('click', function () {
                swal({
                    title: 'Sorry!',
                    text: "You need to make a deposit to proceed!",
                    type: 'warning',
                    padding: '2em'
                    })
                })                   
        </script>

