@props([])
<!-- Button trigger modal -->
<div class="">
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-one">
                <form action="{{route('home.user.topUp')}}" class="account-form" method="post" id="">
                        @csrf
                    <div class="modal-header">
                        <h5 class="modal-title mx-auto" id="staticBackdropLabel">Top up</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="amount">Amount<span>*</span></label>
                            <input type="number" name="amount" placeholder="Enter amount" id="amount" required="">
                            @error('amount')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="custom-button" data-dismiss="modal">Close</a>
                        <button type="submit" class="custom-button">Top up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
