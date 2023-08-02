    <div class="container">
        <h1>Edit Email Campaign</h1>

        <form action="{{ route('email-campaigns.update', $emailCampaign->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ $emailCampaign->subject }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ $emailCampaign->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="shop_owner_id">Shop Owner:</label>
                <select name="shop_owner_id" id="shop_owner_id" class="form-control" required>
                    @foreach ($shopOwners as $shopOwner)
                        <option value="{{ $shopOwner->id }}" {{ $emailCampaign->shop_owner_id === $shopOwner->id ? 'selected' : '' }}>
                            {{ $shopOwner->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Campaign</button>
        </form>
    </div>


<script>



    async function FillUpUpdateForm(id){
        document.getElementById('updateID').value=id;
        showLoader();
        let res=await axios.post("/customer-by-id",{id:id})
        hideLoader();
        document.getElementById('customerNameUpdate').value=res.data['name'];
        document.getElementById('customerEmailUpdate').value=res.data['email'];
        document.getElementById('customerMobileUpdate').value=res.data['mobile'];
    }


    async function Update() {

        let customerName = document.getElementById('customerNameUpdate').value;
        let customerEmail = document.getElementById('customerEmailUpdate').value;
        let customerMobile = document.getElementById('customerMobileUpdate').value;
        let updateID = document.getElementById('updateID').value;


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

            document.getElementById('update-modal-close').click();

            showLoader();

            let res = await axios.post("/update-customer",{name:customerName,email:customerEmail,mobile:customerMobile,id:updateID})

            hideLoader();

            if(res.status===200 && res.data===1){

                successToast('Request completed');

                document.getElementById("update-form").reset();

                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }

</script>
