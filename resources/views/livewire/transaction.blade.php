<div
    x-data="setup()"
>
    <legend>Transaction detail</legend>
    <span x-text="ArkApp.helpers.truncate(id)"></span>
    <span x-text="ArkApp.helpers.readableCurrency(amount)"></span>
</div>

<script>
function setup()
{
    return {
        id: '{{ $transaction->getId() }}',
        amount: '{{ $transaction->getAmount() }}'
    }
}
</script>
