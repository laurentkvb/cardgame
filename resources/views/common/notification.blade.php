@if($notification != NULL)
    @if ($notification == "success")
        <!-- Form Error List -->
        <div class="alert alert-success">
            <strong>You have succesfully added a card to your deck</strong>
        </div>
    @endif

    @if ($notification == "success_delete")
        <!-- Form Error List -->
        <div class="alert alert-danger">
            <strong>You have succesfully deleted a card from your deck</strong>
        </div>
    @endif

@endif