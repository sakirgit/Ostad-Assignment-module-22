<div class="container">
    <h1>Email Campaigns</h1>

    <a href="{{ route('email-campaigns.create') }}" class="btn btn-primary mb-3">Create New Campaign</a>

    @if ($emailCampaigns->isEmpty())
        <p>No email campaigns found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Shop Owner</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emailCampaigns as $campaign)
                    <tr>
                        <td>{{ $campaign->id }}</td>
                        <td>{{ $campaign->subject }}</td>
                        <td>{{ $campaign->shopOwner->name }}</td>
                        <td>
                            <a href="{{ route('email-campaigns.edit', $campaign->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <!-- Add a delete button if required -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>

getList();


async function getList() {


    showLoader();
    let res=await axios.get("/list-customer");
    hideLoader();

    let tableList=$("#tableList");
    let tableData=$("#tableData");

    tableData.DataTable().destroy();
    tableList.empty();

    res.data.forEach(function (item,index) {
        let row=`<tr>
                    <td>${index+1}</td>
                    <td>${item['name']}</td>
                    <td>${item['email']}</td>
                    <td>${item['mobile']}</td>
                    <td>
                        <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                 </tr>`
        tableList.append(row)
    })

    $('.editBtn').on('click', async function () {
           let id= $(this).data('id');
           await FillUpUpdateForm(id)
           $("#update-modal").modal('show');
    })

    $('.deleteBtn').on('click',function () {
        let id= $(this).data('id');
        $("#delete-modal").modal('show');
        $("#deleteID").val(id);
    })

    new DataTable('#tableData',{
        order:[[0,'desc']],
        lengthMenu:[5,10,15,20,30]
    });

}


</script>

