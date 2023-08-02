<div class="container">
    <h1>Create New Email Campaign</h1>

    <form action="{{ route('email-campaigns.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="shop_owner_id">Shop Owner:</label>
            <select name="shop_owner_id" id="shop_owner_id" class="form-control" required>
                <option value="">Select Shop Owner</option>
                @foreach ($shopOwners as $shopOwner)
                    <option value="{{ $shopOwner->id }}">{{ $shopOwner->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Campaign</button>
    </form>
</div>


<script>

    async function Save() {

        let customerName = document.getElementById('customerName').value;
        let customerEmail = document.getElementById('customerEmail').value;
        let customerMobile = document.getElementById('customerMobile').value;

        if (customerName.length === 0) {
            errorToast("Customer Name Required !")
        }
        else if(customerEmail.length===0){
            errorToast("Customer Email Required !")
        }
        else if(customerMobile.length===0){
            errorToast("Customer Mobile Required !")
        }
        else {

            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post("/create-customer",{name:customerName,email:customerEmail,mobile:customerMobile})
            hideLoader();

            if(res.status===201){

                successToast('Request completed');

                document.getElementById("save-form").reset();

                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }

</script>
