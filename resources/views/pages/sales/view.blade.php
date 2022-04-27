<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="sale_view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">View Sale Team </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td scope="row">
                                <p id="sale_name"></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td scope="row">
                                <p id="sale_email"></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Telephone</th>
                            <td scope="row">
                                <p id="sale_telephone"></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Join</th>
                            <td scope="row">
                                <p id="sale_joined_date"></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Comment</th>
                            <td scope="row">
                                <p id="sale_comments"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             </div>
        </div>
    </div>
</div>
