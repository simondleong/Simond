@extends('layout')

@section('content')

    <section class="page-section-ptb">
        <div class="container">

            @if (session()->has('flash_success'))
                <div class="row mb-3">
                    <div class="col-12 text-center alert alert-success">
                        {{ session()->get('flash_success') }}
                    </div>
                </div>
            @elseif (session()->has('flash_error'))
                <div class="row mb-3">
                    <div class="col-12 text-center alert alert-danger">
                        {{ session()->get('flash_error') }}
                    </div>
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h4 class="title divider-3 mb-3">{{ $target->first_name }}&nbsp;{{ $target->last_name }}</h4>
                </div>
            </div>

            <div class="row">
                <!-- THIS IS THE PHOTO BAR -->
                <div class="col-md-5 col-sm-12 col-xs-12 mb-sm-5 text-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="edit-form mb-3">
                                @if (!count($target->photos))
                                    <h3 class="text-center text-black">This user has not uploaded any photo!</h3>
                                @else
                                    @foreach($target->photos as $key => $photo)
                                        <div class="section-field mt-2 mb-2">
                                            <div class="row">
                                                <div class="col-12 picture-container">
                                                    <img id="img{{ $key }}" src="{{ \Illuminate\Support\Facades\Storage::disk('photo')->url($photo->filename) }}"
                                                         alt="picture" class="img-thumbnail" onclick="showImage(this, 'img{{ $key }}')">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- if status is not cancelled or rejected -->
                    @if (!((($date->status) % 2 == 0) && ($date->status != 0)))
                        <div class="row mt-3">
                            <div class="col-12 text-left">

                                <!-- if status is "sent" -->
                                @if ($date->status == $data['config']['Sent'])
                                    @if ($user->id == $date->receiver_id)
                                        <form action="/date/{{ $date->id }}/update" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="status" value="{{ $data['config']['Accepted'] }}"/>
                                            <button type="submit" class="border-success button btn-success text-white">Accept</button>
                                        </form>
                                        <form action="/date/{{ $date->id }}/update" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="status" value="{{ $data['config']['Rejected'] }}"/>
                                            <button type="submit" class="border-danger button btn-danger text-white">Reject</button>
                                        </form>
                                    @else
                                        <form action="/date/{{ $date->id }}/update" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="status" value="{{ $data['config']['Cancelled'] }}"/>
                                            <button type="submit" class="border-danger button btn-danger text-white">Cancel</button>
                                        </form>
                                    @endif

                                <!-- if status is accepted and sender has not paid -->
                                @elseif (($date->status == $data['config']['Accepted'])&&
                                    ($date->payment_status == $data['config']['Unpaid']))
                                    @if ($user->id == $date->receiver_id)
                                        <p>Please wait for the sender to complete payment.</p>
                                    @else
                                        <button id="payment-button" class="btn btn-block btn-warning paypal-button-shape-pill mb-3"
                                                onclick="showModal()">
                                            <img class="paypal-button-logo paypal-button-logo-pp paypal-button-logo-gold" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAyNCAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWluWU1pbiBtZWV0Ij4KICAgIDxwYXRoIGZpbGw9IiMwMDljZGUiIGQ9Ik0gMjAuOTA1IDkuNSBDIDIxLjE4NSA3LjQgMjAuOTA1IDYgMTkuNzgyIDQuNyBDIDE4LjU2NCAzLjMgMTYuNDExIDIuNiAxMy42OTcgMi42IEwgNS43MzkgMi42IEMgNS4yNzEgMi42IDQuNzEgMy4xIDQuNjE1IDMuNiBMIDEuMzM5IDI1LjggQyAxLjMzOSAyNi4yIDEuNjIgMjYuNyAyLjA4OCAyNi43IEwgNi45NTYgMjYuNyBMIDYuNjc1IDI4LjkgQyA2LjU4MSAyOS4zIDYuODYyIDI5LjYgNy4yMzYgMjkuNiBMIDExLjM1NiAyOS42IEMgMTEuODI1IDI5LjYgMTIuMjkyIDI5LjMgMTIuMzg2IDI4LjggTCAxMi4zODYgMjguNSBMIDEzLjIyOCAyMy4zIEwgMTMuMjI4IDIzLjEgQyAxMy4zMjIgMjIuNiAxMy43OSAyMi4yIDE0LjI1OCAyMi4yIEwgMTQuODIxIDIyLjIgQyAxOC44NDUgMjIuMiAyMS45MzUgMjAuNSAyMi44NzEgMTUuNSBDIDIzLjMzOSAxMy40IDIzLjE1MyAxMS43IDIyLjAyOSAxMC41IEMgMjEuNzQ4IDEwLjEgMjEuMjc5IDkuOCAyMC45MDUgOS41IEwgMjAuOTA1IDkuNSI+PC9wYXRoPgogICAgPHBhdGggZmlsbD0iIzAxMjE2OSIgZD0iTSAyMC45MDUgOS41IEMgMjEuMTg1IDcuNCAyMC45MDUgNiAxOS43ODIgNC43IEMgMTguNTY0IDMuMyAxNi40MTEgMi42IDEzLjY5NyAyLjYgTCA1LjczOSAyLjYgQyA1LjI3MSAyLjYgNC43MSAzLjEgNC42MTUgMy42IEwgMS4zMzkgMjUuOCBDIDEuMzM5IDI2LjIgMS42MiAyNi43IDIuMDg4IDI2LjcgTCA2Ljk1NiAyNi43IEwgOC4yNjcgMTguNCBMIDguMTczIDE4LjcgQyA4LjI2NyAxOC4xIDguNzM1IDE3LjcgOS4yOTYgMTcuNyBMIDExLjYzNiAxNy43IEMgMTYuMjI0IDE3LjcgMTkuNzgyIDE1LjcgMjAuOTA1IDEwLjEgQyAyMC44MTIgOS44IDIwLjkwNSA5LjcgMjAuOTA1IDkuNSI+PC9wYXRoPgogICAgPHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSA5LjQ4NSA5LjUgQyA5LjU3NyA5LjIgOS43NjUgOC45IDEwLjA0NiA4LjcgQyAxMC4yMzIgOC43IDEwLjMyNiA4LjYgMTAuNTEzIDguNiBMIDE2LjY5MiA4LjYgQyAxNy40NDIgOC42IDE4LjE4OSA4LjcgMTguNzUzIDguOCBDIDE4LjkzOSA4LjggMTkuMTI3IDguOCAxOS4zMTQgOC45IEMgMTkuNTAxIDkgMTkuNjg4IDkgMTkuNzgyIDkuMSBDIDE5Ljg3NSA5LjEgMTkuOTY4IDkuMSAyMC4wNjMgOS4xIEMgMjAuMzQzIDkuMiAyMC42MjQgOS40IDIwLjkwNSA5LjUgQyAyMS4xODUgNy40IDIwLjkwNSA2IDE5Ljc4MiA0LjYgQyAxOC42NTggMy4yIDE2LjUwNiAyLjYgMTMuNzkgMi42IEwgNS43MzkgMi42IEMgNS4yNzEgMi42IDQuNzEgMyA0LjYxNSAzLjYgTCAxLjMzOSAyNS44IEMgMS4zMzkgMjYuMiAxLjYyIDI2LjcgMi4wODggMjYuNyBMIDYuOTU2IDI2LjcgTCA4LjI2NyAxOC40IEwgOS40ODUgOS41IFoiPjwvcGF0aD4KPC9zdmc+Cg==" alt="pp" style="visibility: visible;">
                                            <img class="paypal-button-logo paypal-button-logo-paypal paypal-button-logo-gold" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjMyIiB2aWV3Qm94PSIwIDAgMTAwIDMyIiB4bWxucz0iaHR0cDomI3gyRjsmI3gyRjt3d3cudzMub3JnJiN4MkY7MjAwMCYjeDJGO3N2ZyIgcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pbllNaW4gbWVldCI+PHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSAxMiA0LjkxNyBMIDQuMiA0LjkxNyBDIDMuNyA0LjkxNyAzLjIgNS4zMTcgMy4xIDUuODE3IEwgMCAyNS44MTcgQyAtMC4xIDI2LjIxNyAwLjIgMjYuNTE3IDAuNiAyNi41MTcgTCA0LjMgMjYuNTE3IEMgNC44IDI2LjUxNyA1LjMgMjYuMTE3IDUuNCAyNS42MTcgTCA2LjIgMjAuMjE3IEMgNi4zIDE5LjcxNyA2LjcgMTkuMzE3IDcuMyAxOS4zMTcgTCA5LjggMTkuMzE3IEMgMTQuOSAxOS4zMTcgMTcuOSAxNi44MTcgMTguNyAxMS45MTcgQyAxOSA5LjgxNyAxOC43IDguMTE3IDE3LjcgNi45MTcgQyAxNi42IDUuNjE3IDE0LjYgNC45MTcgMTIgNC45MTcgWiBNIDEyLjkgMTIuMjE3IEMgMTIuNSAxNS4wMTcgMTAuMyAxNS4wMTcgOC4zIDE1LjAxNyBMIDcuMSAxNS4wMTcgTCA3LjkgOS44MTcgQyA3LjkgOS41MTcgOC4yIDkuMzE3IDguNSA5LjMxNyBMIDkgOS4zMTcgQyAxMC40IDkuMzE3IDExLjcgOS4zMTcgMTIuNCAxMC4xMTcgQyAxMi45IDEwLjUxNyAxMy4xIDExLjIxNyAxMi45IDEyLjIxNyBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSAzNS4yIDEyLjExNyBMIDMxLjUgMTIuMTE3IEMgMzEuMiAxMi4xMTcgMzAuOSAxMi4zMTcgMzAuOSAxMi42MTcgTCAzMC43IDEzLjYxNyBMIDMwLjQgMTMuMjE3IEMgMjkuNiAxMi4wMTcgMjcuOCAxMS42MTcgMjYgMTEuNjE3IEMgMjEuOSAxMS42MTcgMTguNCAxNC43MTcgMTcuNyAxOS4xMTcgQyAxNy4zIDIxLjMxNyAxNy44IDIzLjQxNyAxOS4xIDI0LjgxNyBDIDIwLjIgMjYuMTE3IDIxLjkgMjYuNzE3IDIzLjggMjYuNzE3IEMgMjcuMSAyNi43MTcgMjkgMjQuNjE3IDI5IDI0LjYxNyBMIDI4LjggMjUuNjE3IEMgMjguNyAyNi4wMTcgMjkgMjYuNDE3IDI5LjQgMjYuNDE3IEwgMzIuOCAyNi40MTcgQyAzMy4zIDI2LjQxNyAzMy44IDI2LjAxNyAzMy45IDI1LjUxNyBMIDM1LjkgMTIuNzE3IEMgMzYgMTIuNTE3IDM1LjYgMTIuMTE3IDM1LjIgMTIuMTE3IFogTSAzMC4xIDE5LjMxNyBDIDI5LjcgMjEuNDE3IDI4LjEgMjIuOTE3IDI1LjkgMjIuOTE3IEMgMjQuOCAyMi45MTcgMjQgMjIuNjE3IDIzLjQgMjEuOTE3IEMgMjIuOCAyMS4yMTcgMjIuNiAyMC4zMTcgMjIuOCAxOS4zMTcgQyAyMy4xIDE3LjIxNyAyNC45IDE1LjcxNyAyNyAxNS43MTcgQyAyOC4xIDE1LjcxNyAyOC45IDE2LjExNyAyOS41IDE2LjcxNyBDIDMwIDE3LjQxNyAzMC4yIDE4LjMxNyAzMC4xIDE5LjMxNyBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSA1NS4xIDEyLjExNyBMIDUxLjQgMTIuMTE3IEMgNTEgMTIuMTE3IDUwLjcgMTIuMzE3IDUwLjUgMTIuNjE3IEwgNDUuMyAyMC4yMTcgTCA0My4xIDEyLjkxNyBDIDQzIDEyLjQxNyA0Mi41IDEyLjExNyA0Mi4xIDEyLjExNyBMIDM4LjQgMTIuMTE3IEMgMzggMTIuMTE3IDM3LjYgMTIuNTE3IDM3LjggMTMuMDE3IEwgNDEuOSAyNS4xMTcgTCAzOCAzMC41MTcgQyAzNy43IDMwLjkxNyAzOCAzMS41MTcgMzguNSAzMS41MTcgTCA0Mi4yIDMxLjUxNyBDIDQyLjYgMzEuNTE3IDQyLjkgMzEuMzE3IDQzLjEgMzEuMDE3IEwgNTUuNiAxMy4wMTcgQyA1NS45IDEyLjcxNyA1NS42IDEyLjExNyA1NS4xIDEyLjExNyBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA2Ny41IDQuOTE3IEwgNTkuNyA0LjkxNyBDIDU5LjIgNC45MTcgNTguNyA1LjMxNyA1OC42IDUuODE3IEwgNTUuNSAyNS43MTcgQyA1NS40IDI2LjExNyA1NS43IDI2LjQxNyA1Ni4xIDI2LjQxNyBMIDYwLjEgMjYuNDE3IEMgNjAuNSAyNi40MTcgNjAuOCAyNi4xMTcgNjAuOCAyNS44MTcgTCA2MS43IDIwLjExNyBDIDYxLjggMTkuNjE3IDYyLjIgMTkuMjE3IDYyLjggMTkuMjE3IEwgNjUuMyAxOS4yMTcgQyA3MC40IDE5LjIxNyA3My40IDE2LjcxNyA3NC4yIDExLjgxNyBDIDc0LjUgOS43MTcgNzQuMiA4LjAxNyA3My4yIDYuODE3IEMgNzIgNS42MTcgNzAuMSA0LjkxNyA2Ny41IDQuOTE3IFogTSA2OC40IDEyLjIxNyBDIDY4IDE1LjAxNyA2NS44IDE1LjAxNyA2My44IDE1LjAxNyBMIDYyLjYgMTUuMDE3IEwgNjMuNCA5LjgxNyBDIDYzLjQgOS41MTcgNjMuNyA5LjMxNyA2NCA5LjMxNyBMIDY0LjUgOS4zMTcgQyA2NS45IDkuMzE3IDY3LjIgOS4zMTcgNjcuOSAxMC4xMTcgQyA2OC40IDEwLjUxNyA2OC41IDExLjIxNyA2OC40IDEyLjIxNyBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA5MC43IDEyLjExNyBMIDg3IDEyLjExNyBDIDg2LjcgMTIuMTE3IDg2LjQgMTIuMzE3IDg2LjQgMTIuNjE3IEwgODYuMiAxMy42MTcgTCA4NS45IDEzLjIxNyBDIDg1LjEgMTIuMDE3IDgzLjMgMTEuNjE3IDgxLjUgMTEuNjE3IEMgNzcuNCAxMS42MTcgNzMuOSAxNC43MTcgNzMuMiAxOS4xMTcgQyA3Mi44IDIxLjMxNyA3My4zIDIzLjQxNyA3NC42IDI0LjgxNyBDIDc1LjcgMjYuMTE3IDc3LjQgMjYuNzE3IDc5LjMgMjYuNzE3IEMgODIuNiAyNi43MTcgODQuNSAyNC42MTcgODQuNSAyNC42MTcgTCA4NC4zIDI1LjYxNyBDIDg0LjIgMjYuMDE3IDg0LjUgMjYuNDE3IDg0LjkgMjYuNDE3IEwgODguMyAyNi40MTcgQyA4OC44IDI2LjQxNyA4OS4zIDI2LjAxNyA4OS40IDI1LjUxNyBMIDkxLjQgMTIuNzE3IEMgOTEuNCAxMi41MTcgOTEuMSAxMi4xMTcgOTAuNyAxMi4xMTcgWiBNIDg1LjUgMTkuMzE3IEMgODUuMSAyMS40MTcgODMuNSAyMi45MTcgODEuMyAyMi45MTcgQyA4MC4yIDIyLjkxNyA3OS40IDIyLjYxNyA3OC44IDIxLjkxNyBDIDc4LjIgMjEuMjE3IDc4IDIwLjMxNyA3OC4yIDE5LjMxNyBDIDc4LjUgMTcuMjE3IDgwLjMgMTUuNzE3IDgyLjQgMTUuNzE3IEMgODMuNSAxNS43MTcgODQuMyAxNi4xMTcgODQuOSAxNi43MTcgQyA4NS41IDE3LjQxNyA4NS43IDE4LjMxNyA4NS41IDE5LjMxNyBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA5NS4xIDUuNDE3IEwgOTEuOSAyNS43MTcgQyA5MS44IDI2LjExNyA5Mi4xIDI2LjQxNyA5Mi41IDI2LjQxNyBMIDk1LjcgMjYuNDE3IEMgOTYuMiAyNi40MTcgOTYuNyAyNi4wMTcgOTYuOCAyNS41MTcgTCAxMDAgNS42MTcgQyAxMDAuMSA1LjIxNyA5OS44IDQuOTE3IDk5LjQgNC45MTcgTCA5NS44IDQuOTE3IEMgOTUuNCA0LjkxNyA5NS4yIDUuMTE3IDk1LjEgNS40MTcgWiI+PC9wYXRoPjwvc3ZnPg==" alt="paypal" style="visibility: visible;">
                                            <span class="paypal-button-text" style="display: inline-block; visibility: visible;"> Checkout</span>
                                        </button>
                                    @endif

                                <!-- if receiver has not stated meeting status -->
                                @elseif (($user->id == $date->receiver_id) &&
                                            ($date->receiver_confirmation == $data['config']['Not initiated yet']))

                                <!-- if date has been paid -->
                                    @if (($date->status == $data['config']['Accepted']) && ($date->payment_status != $data['config']['Unpaid']))
                                        <a class="btn btn-primary mb-2" href="/chat/{{ $date->chat->id }}">Chat</a>
                                        <form class="mb-2" action="/date/{{ $date->id }}/update-receiver" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="receiver_confirmation"
                                                   value="{{ $data['config']['Met'] }}">
                                            <button type="submit" class="btn btn-success">I have met my date</button>
                                        </form>
                                        <form action="/date/{{ $date->id }}/update-receiver" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="receiver_confirmation"
                                                   value="{{ $data['config']['No Meeting'] }}">
                                            <button type="submit" class="btn btn-danger">We never met</button>
                                        </form>
                                    @endif

                                <!-- if sender has not stated meeting status -->
                                @elseif (($user->id == $date->sender_id) &&
                                            ($date->sender_confirmation == $data['config']['Not initiated yet']))

                                <!-- if date has been paid -->
                                    @if (($date->status == $data['config']['Accepted']) && ($date->payment_status == $data['config']['Paid']))
                                        <a class="btn btn-primary mb-2" href="/chat/{{ $date->chat->id }}">Chat</a>
                                        <form class="mb-2" action="/date/{{ $date->id }}/update-sender" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="sender_confirmation"
                                                   value="{{ $data['config']['Met'] }}">
                                            <button type="submit" class="btn btn-success">I have met my date</button>
                                        </form>
                                        <form action="/date/{{ $date->id }}/update-sender" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="sender_confirmation"
                                                   value="{{ $data['config']['No Meeting'] }}">
                                            <button type="submit" class="btn btn-danger">We never met</button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
                <!-- END OF PHOTO BAR -->

                <div class="col-md-7 col-sm-12 col-xs-12 ">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center mb-0">
                                <tbody>
                                @if (($date->status) % 2 == 1)
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $target->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $target->phone }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ $data['gender'][$target->gender] }}</td>
                                </tr>
                                <tr>
                                    <td>Sexual Preference</td>
                                    <td>{{ $data['sexual_preference'][$target->sexual_preference] }}</td>
                                </tr>
                                <tr>
                                    <td>Personality Type</td>
                                    <td>{{ $data['personality_type'][$target->personality_type] }}</td>
                                </tr>
                                <tr>
                                    <td>Age</td>
                                    <td>{{ $data['age'][$target->age] }}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{{ $data['city'][$target->city] }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The Modal -->
    <div id="imageModal" class="modal">

        <!-- The Close Button -->
        <span class="close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="modal-img">
    </div>

    <!-- confirmation modal -->
    <div id="paymentModal" class="modal">

        <!-- Close Button -->
        <span class="closeModal">&times;</span>

        <!-- Modal Content (Details of payment) -->
        <div class="container">
            <div class="row text-center">
                <div class="offset-md-3 col-md-6 col-sm-12 col-xs-12 bg-white">
                    <div class="row">
                        <div class="col-12 pt-2 pb-2" style="background: #2176bd;">
                            <h3 class="text-white">Yeedate Service Payment</h3>
                        </div>
                    </div>
                    <div class="panel panel-default text-center ptb-20">
                        <div class="mb-4">
                            <h3 class="text-black">Amount Due</h3>

                            <div class="offset-3 col-6 mt-3">
                                <p class="bigger">{{ $data['config']['currency'] }}&nbsp;{{ $data['config']['payment_amount'] }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <a href="/profile/date/{{ $date->id }}/process-payment">
                                    <button type="button" class="btn btn-info">
                                        Process Payment
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .paypal-button .paypal-button-logo, .paypal-button .paypal-button-text {
            vertical-align: top;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            text-align: left;
        }

        .paypal-button-text {
            display: inline-block;
            white-space: pre-wrap;
        }

        .paypal-button-shape-pill {
            display: flex;
            padding: 10px 0;
            justify-content: center;
            align-items: center;
            border-radius: 23px;
        }

        @media only screen and (min-width: 300px) {
            .paypal-button-logo {
                height: 21px;
                max-height: 27px;
                min-height: 18px;
            }
        }

        @media only screen and (max-width: 299px) {
            .paypal-button-logo {
                height: 15px;
                max-height: 21px;
                min-height: 12px;
            }

            .paypal-button-text {
                font-size: 12px;
            }
        }

    </style>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/photo/modal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/payment/modal.js') }}"></script>

@endsection