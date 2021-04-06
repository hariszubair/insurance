@extends('layouts.app')

@section('content')
<style>
  div[data-acc-content] {
    display: none;
  }

  div[data-acc-step]:not(.open) {
    background: #f2f2f2;
  }

  div[data-acc-step]:not(.open) h5 {
    color: #777;
  }

  div[data-acc-step]:not(.open) .badge-primary {
    background: #ccc;
  }

  label {
    margin-bottom: 0;
  }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<input id="record_id" name="record_id" value="" style="display: none">
<div class="list-group" id="accordion">

  <!-- Step 1 -->
  <div class="list-group-item py-3" data-acc-step>
    <h5 class="mb-0" data-acc-title>Car Details</h5>

    <div data-acc-content id="1-content">
      <form id="car_detail_form" method="post" style="width: 100%">
        <div class="row g-gs" style="padding-top: 10px;padding-bottom: 10px">
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Car registration number:
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <input id="reg_no" type="text" class="form-control" name="reg_no" value="{{ old('reg_no') }}" autofocus placeholder="Registration #">

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Make
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <input id="car_make" type="text" class="form-control" name="car_make" value="{{ old('car_make') }}" autofocus placeholder="Please enter car manufacturer">

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Model
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <input id="car_model" type="text" class="form-control" name="car_model" value="{{ old('car_model') }}" autofocus placeholder="Please enter the car model">

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Fuel Type
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="fuel_type" type="text" class="form-control" name="fuel_type" autofocus>
                  <option value="">Please select the following</option>
                  <option value="Diesel">Diesel</option>
                  <option value="Petrol">Petrol</option>
                  <option value="Hybrid">Hybrid</option>
                  <option value="Electric">Electric</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Will this car be used for business purposes?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="buisness_purpose" type="text" class="form-control" name="buisness_purpose" autofocus>
                  <option value="">Please select the following</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6" id="buisness_purpose_div" style="display: none">
            <div class="form-group">
              <!-- Label -->
              <label>
                Will this car be used for business purposes?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="business_type" type="text" class="form-control" name="business_type" autofocus required>
                  <option value="">Please select the following</option>
                  <option value="Limited Buisness Use">Limited Buisness Use</option>
                  <option value="Buisness Use">Buisness Use</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6" id="nonbuisness_purpose_div" style="display: none">
            <div class="form-group">
              <!-- Label -->
              <label>
                Will this car be used for commuting to work?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="car_commute" type="text" class="form-control" name="car_commute" autofocus required>
                  <option value="">Please select the following</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                How many kilometres do you drive per year?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="average_drive" type="text" class="form-control" name="average_drive" autofocus required>
                  <option value="">Please select the following</option>
                  <option>Up to 5,000 km</option>
                  <option>Up to 8,000 km</option>
                  <option>Up to 10,000 km</option>
                  <option>Up to 11,000 km</option>
                  <option>Up to 12,000 km</option>
                  <option>Up to 13,000 km</option>
                  <option>Up to 14,000 km</option>
                  <option>Up to 15,000 km</option>
                  <option>Up to 16,000 km</option>
                  <option>Up to 17,000 km</option>
                  <option>Up to 18,000 km</option>
                  <option>Up to 19,000 km</option>
                  <option>Up to 20,000 km</option>
                  <option>Up to 20,000 km</option>
                  <option>Up to 25,000 km</option>
                  <option>Up to 30,000 km</option>
                  <option>Up to 35,000 km</option>
                  <option>Up to 40,000 km</option>
                  <option>Up to 50,000 km</option>
                  <option>Over 50,000 km</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>

  <!-- Step 2 -->
  <div class="list-group-item py-3" data-acc-step>
    <form id="driving_history_form" method="post" style="width: 100%">

      <h5 class="mb-0" data-acc-title>Driving History</h5>
      <div data-acc-content id="2-content">
        <div class="row g-gs" style="padding-top: 10px;padding-bottom: 10px">
          <div class="col-md-6">
            <label>Choose your current driving licence</label>
            <select id="driving_licence" type="text" class="form-control" name="driving_licence" autofocus required>
              <option value="">Please select the following</option>

              <option value="ROI(Full)">ROI(Full)</option>
              <option value="ROI(Provisional)">ROI(Provisional)</option>
              <option value="UK(Full)">UK(Full)</option>
              <option value="EU(Full)">EU(Full)</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="col-md-6">
            <label>How long have you held this licence?</label>
            <select id="licence_period" type="text" class="form-control" name="licence_period" autofocus required>
              <option value="">Please select the following</option>

              <option value="10+ years">10+ years</option>
              <option value="9 years">9 years</option>
              <option value="8 years">8 years</option>
              <option value="7 years">7 years</option>
              <option value="6 years">6 years</option>
              <option value="5 years">5 years</option>
              <option value="4 years">4 years</option>
              <option value="3 years">3 years</option>
              <option value="2 years">2 years</option>
              <option value="1 year">1 year</option>
              <option value="Less than 1 year">Less than 1 year</option>
            </select>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Do you have any penalty points?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="penalty_points" type="text" class="form-control" name="penalty_points" autofocus required>
                  <option value="">Please select the following</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6" id="points_count_div" style="display: none">
            <div class="form-group">
              <!-- Label -->
              <label>
                How many penalty points do you have?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="points_count" type="text" class="form-control" name="points_count" autofocus required>
                  <option value="">Please select the following</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6+">6+</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6" id="points_details_div" style="display: none">
            <div class="form-group">
              <!-- Label -->
              <label>
                <b>Please confirm</b>
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <p> <b>Were any of these penalty points given for any of the reasons listed?</b></p>
                <br>
                <ol style="padding-left: 20px;list-style-type: circle;">
                  <li>Drunk Driving : 50mg – 79mg per 100ml of blood</li>
                  <li>Driving on a motorway against the flow of traffic</li>
                  <li>Failure to drive on the left hand side of the road</li>
                  <li>Driving without reasonable consideration</li>
                  <li>Breach of duties at an accident</li>
                  <li>Driving without insurance</li>
                  <li>Driver found to be driving carelessly</li>
                </ol>

              </div>

            </div>

          </div>
          <div class="col-md-6" id="penalty_reason_div" style="display: none">
            <div class="form-group">
              <!-- Label -->

              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="penalty_reason" type="text" class="form-control" name="penalty_reason" autofocus required>
                  <option value="">Penalty points given for any of the reasons listed?</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                What was your most recent insurance?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="recent_insurance" type="text" class="form-control" name="recent_insurance" autofocus required>
                  <option value="">Please select the following</option>
                  <option value="Insured in own name">Insured in own name</option>
                  <option value="No previous insurance">No previous insurance</option>
                  <option value="Insured as named driver">Insured as named driver</option>
                  <option value="Insured on a company car">Insured on a company car</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- Step 3 -->
  <div class="list-group-item py-3" data-acc-step>
    <h5 class="mb-0" data-acc-title>Additional drivers</h5>

    <div data-acc-content id="3-content">
      <div style="text-align: center;padding: 5px">
        <button class="btn btn-success" id='add_driver_div_button' type="button">Add Driver</button>
      </div>
      <div>
        <table id="drivers" class="display table table-striped table-bordered dt-responsive " scroll="no" style="overflow: hidden" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="width: 35%">Name</th>
              <th style="width: 15%">Date of birth</th>
              <th style="width: 15%">Gender</th>
              <th>Licence Type</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
      <form id="add_driver_form" method="post" style="width: 100%">

        <div class="row g-gs" style="padding-top: 10px;padding-bottom: 10px;display: none" id='add_driver_div'>
          <div class="col-md-6">
            <label>What is this driver's relationship to you?</label>
            <select id="relation" type="text" class="form-control" name="relation" autofocus required>
              <option value="">Please select the following</option>

              <option value="Child living at home">Child living at home</option>
              <option value="Child living away from home">Child living away from home</option>
              <option value="Child with a car">Child with a car</option>
              <option value="Other">Other</option>
              <option value="Parent">Parent</option>
              <option value="Spouse/Partner doesn't have a car">Spouse/Partner doesn't have a car</option>
              <option value="Spouse/Partner with have a car">Spouse/Partner with have a car</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Date of birth</label>
            <input id="d_o_b" type="date" class="form-control" name="d_o_b" autofocus required>

          </div>
          <div class="col-md-6">
            <label>First Name</label>
            <input id="first_name" type="text" class="form-control" name="first_name" autofocus required>

          </div>
          <div class="col-md-6">
            <label>Last Name</label>
            <input id="last_name" type="text" class="form-control" name="last_name" autofocus required>

          </div>
          <div class="col-md-6">
            <label>Gender</label>
            <select id="gender" type="text" class="form-control" name="gender" autofocus required>
              <option value="">Please select the following</option>

              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Choose your current driving licence</label>
            <select id="driver_driving_licence" type="text" class="form-control" name="driving_licence" autofocus required>
              <option value="">Please select the following</option>

              <option value="ROI(Full)">ROI(Full)</option>
              <option value="ROI(Provisional)">ROI(Provisional)</option>
              <option value="UK(Full)">UK(Full)</option>
              <option value="EU(Full)">EU(Full)</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="col-md-6">
            <label>How long have you held this licence?</label>
            <select id="driver_licence_period" type="text" class="form-control" name="licence_period" autofocus required>
              <option value="">Please select the following</option>

              <option value="10+ years">10+ years</option>
              <option value="9 years">9 years</option>
              <option value="8 years">8 years</option>
              <option value="7 years">7 years</option>
              <option value="6 years">6 years</option>
              <option value="5 years">5 years</option>
              <option value="4 years">4 years</option>
              <option value="3 years">3 years</option>
              <option value="2 years">2 years</option>
              <option value="1 year">1 year</option>
              <option value="Less than 1 year">Less than 1 year</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Occupation</label>
            <input id="occupation" type="text" class="form-control" name="occupation" autofocus required>

          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Do you have any penalty points?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="driver_penalty_points" type="text" class="form-control" name="penalty_points" autofocus required>
                  <option value="">Please select the following</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6" id="driver_points_count_div" style="display: none">
            <div class="form-group">
              <!-- Label -->
              <label>
                How many penalty points do you have?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="driver_points_count" type="text" class="form-control" name="points_count" autofocus required>
                  <option value="">Please select the following</option>
                  <option value="1">1</option>
                  <option value="1">2</option>
                  <option value="1">3</option>
                  <option value="1">4</option>
                  <option value="1">5</option>
                  <option value="1">6+</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6" id="driver_points_details_div" style="display: none">
            <div class="form-group">
              <!-- Label -->
              <label>
                <b>Please confirm</b>
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <p> <b>Were any of these penalty points given for any of the reasons listed?</b></p>
                <br>
                <ol style="padding-left: 20px;list-style-type: circle;">
                  <li>Drunk Driving : 50mg – 79mg per 100ml of blood</li>
                  <li>Driving on a motorway against the flow of traffic</li>
                  <li>Failure to drive on the left hand side of the road</li>
                  <li>Driving without reasonable consideration</li>
                  <li>Breach of duties at an accident</li>
                  <li>Driving without insurance</li>
                  <li>Driver found to be driving carelessly</li>
                </ol>

              </div>

            </div>

          </div>
          <div class="col-md-6" id="driver_penalty_reason_div" style="display: none">
            <div class="form-group">
              <!-- Label -->

              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="driver_penalty_reason" type="text" class="form-control" name="penalty_reason" autofocus required>
                  <option value="">Penalty points given for any of the reasons listed?</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6" style="margin-top: 21px;">


            <button class="btn btn-success" id='add_driver_button' type="button">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Step 4 -->
  <div class="list-group-item py-3" data-acc-step>
    <h5 class="mb-0" data-acc-title>Claims</h5>

    <div data-acc-content id="4-content">
      <div style="text-align: center;padding: 5px">
        <button class="btn btn-success" type="button" id="add_claims_div_button">Add Claims</button>
      </div>
      <div>
        <table id="claims" class="display table table-striped table-bordered dt-responsive " scroll="no" style="overflow: hidden" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="width: 35%">Claim type</th>
              <th style="width: 15%">Date of claim</th>
              <th style="width: 15%">Driver</th>
              <th>Settlement amount</th>
              <th style="width: 10%">Action</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
      <form id="add_claims_form" method="post" style="width: 100%">

        <div class="row g-gs" style="padding-top: 10px;padding-bottom: 10px;display: none" id='add_claims_div'>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Which driver does this claim relate to?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <input id="claims_drivers" type="text" class="form-control" name="claims_drivers" autofocus required>

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Date of claim?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <input id="d_o_c" type="date" class="form-control" name="d_o_c" autofocus required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Type of claim
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="claim_type" type="text" class="form-control" name="claim_type" autofocus required>
                  <option value="">Please select the following</option>
                  <option value="Accidental damage">Accidental damage</option>
                  <option value="Fire">Fire</option>
                  <option value="Malicious damage as a result of theft">Malicious damage as a result of theft</option>
                  <option value="Personal accident">Personal accident</option>
                  <option value="Fire">Fire</option>
                  <option value="Personal effects">Personal effects</option>
                  <option value="Theft">Theft</option>
                  <option value="Third Party">Third Party</option>
                  <option value="Windscreen">Windscreen</option>
                  <option value="Vandalism">Vandalism</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <!-- Label -->
              <label>
                Has this claim been settled?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <select id="claim_settled" type="text" class="form-control" name="claim_settled" autofocus required>
                  <option value="">Please select the following</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6" id="claim_amount_div" style="display: none">
            <div class="form-group">
              <!-- Label -->
              <label>
                Settlement amount?
              </label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <div class="input-icon">
                  <i class="ri-user-line color-primary"></i>
                </div>
                <input id="claim_amount" type="text" class="form-control" name="claim_amount" autofocus required>
              </div>
            </div>
          </div>
          <div class="col-md-6" style="margin-top: 21px;">
            <button class="btn btn-success" id='add_claim_button' type="button">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Step 5 -->
<form action="{{URL('auto/submit_quote')}}" method="post">
  @csrf
  <div class="list-group-item py-3" data-acc-step>
    <h5 class="mb-0" data-acc-title>Your cover</h5>
    <div data-acc-content id="4-content">

      <div class="row g-gs" style="padding-top: 10px;padding-bottom: 10px;" id='add_claims_div'>
        <div class="col-md-6">
          <label>When do you want your insurance to start?</label>
          <input id="policy_start" type="date" class="form-control" name="policy_start" autofocus required>
        </div>
        <input id="duplicate_record_id" name="duplicate_record_id" style="display: none">


      </div>
    </div>
  </div>
</form>

</div>

<!-- edit driver -->
<form id="edit_driver_form" method="post" style="width: 100%">

  <div class="modal fade edit_driver_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Edit Driver</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row g-gs" style="padding-top: 10px;padding-bottom: 10px">
            <div class="col-md-6">
              <label>What is this driver's relationship to you?</label>
              <select id="edit_relation" type="text" class="form-control" name="relation" autofocus required>
                <option value="">Please select the following</option>

                <option value="Child living at home">Child living at home</option>
                <option value="Child living away from home">Child living away from home</option>
                <option value="Child with a car">Child with a car</option>
                <option value="Other">Other</option>
                <option value="Parent">Parent</option>
                <option value="Spouse/Partner doesn't have a car">Spouse/Partner doesn't have a car</option>
                <option value="Spouse/Partner with have a car">Spouse/Partner with have a car</option>
              </select>
            </div>
            <div class="col-md-6" style="display: none">
              <label>id</label>
              <input id="edit_driver_id" type="text" class="form-control" name="id" autofocus required>

            </div>
            <div class="col-md-6">
              <label>Date of birth</label>
              <input id="edit_d_o_b" type="date" class="form-control" name="d_o_b" autofocus required>

            </div>
            <div class="col-md-6">
              <label>First Name</label>
              <input id="edit_first_name" type="text" class="form-control" name="first_name" autofocus required>

            </div>
            <div class="col-md-6">
              <label>Last Name</label>
              <input id="edit_last_name" type="text" class="form-control" name="last_name" autofocus required>

            </div>
            <div class="col-md-6">
              <label>Gender</label>
              <select id="edit_gender" type="text" class="form-control" name="gender" autofocus required>
                <option value="">Please select the following</option>

                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div class="col-md-6">
              <label>Choose your current driving licence</label>
              <select id="edit_driver_driving_licence" type="text" class="form-control" name="driving_licence" autofocus required>
                <option value="">Please select the following</option>

                <option value="ROI(Full)">ROI(Full)</option>
                <option value="ROI(Provisional)">ROI(Provisional)</option>
                <option value="UK(Full)">UK(Full)</option>
                <option value="EU(Full)">EU(Full)</option>
                <option value="Other">Other</option>
              </select>
            </div>

            <div class="col-md-6">
              <label>How long have you held this licence?</label>
              <select id="edit_driver_licence_period" type="text" class="form-control" name="licence_period" autofocus required>
                <option value="">Please select the following</option>

                <option value="10+ years">10+ years</option>
                <option value="9 years">9 years</option>
                <option value="8 years">8 years</option>
                <option value="7 years">7 years</option>
                <option value="6 years">6 years</option>
                <option value="5 years">5 years</option>
                <option value="4 years">4 years</option>
                <option value="3 years">3 years</option>
                <option value="2 years">2 years</option>
                <option value="1 year">1 year</option>
                <option value="Less than 1 year">Less than 1 year</option>
              </select>
            </div>
            <div class="col-md-6">
              <label>Occupation</label>
              <input id="edit_occupation" type="text" class="form-control" name="occupation" autofocus required>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <!-- Label -->
                <label>
                  Do you have any penalty points?
                </label>
                <!-- Input group -->
                <div class="input-group input-group-merge">
                  <div class="input-icon">
                    <i class="ri-user-line color-primary"></i>
                  </div>
                  <select id="edit_driver_penalty_points" type="text" class="form-control" name="penalty_points" autofocus required>
                    <option value="">Please select the following</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6" id="edit_driver_points_count_div" style="display: none">
              <div class="form-group">
                <!-- Label -->
                <label>
                  How many penalty points do you have?
                </label>
                <!-- Input group -->
                <div class="input-group input-group-merge">
                  <div class="input-icon">
                    <i class="ri-user-line color-primary"></i>
                  </div>
                  <select id="edit_driver_points_count" type="text" class="form-control" name="points_count" autofocus required>
                    <option value="">Please select the following</option>
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="1">5</option>
                    <option value="1">6+</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6" id="edit_driver_points_details_div" style="display: none">
              <div class="form-group">
                <!-- Label -->
                <label>
                  <b>Please confirm</b>
                </label>
                <!-- Input group -->
                <div class="input-group input-group-merge">
                  <div class="input-icon">
                    <i class="ri-user-line color-primary"></i>
                  </div>
                  <p> <b>Were any of these penalty points given for any of the reasons listed?</b></p>
                  <br>
                  <ol style="padding-left: 20px;list-style-type: circle;">
                    <li>Drunk Driving : 50mg – 79mg per 100ml of blood</li>
                    <li>Driving on a motorway against the flow of traffic</li>
                    <li>Failure to drive on the left hand side of the road</li>
                    <li>Driving without reasonable consideration</li>
                    <li>Breach of duties at an accident</li>
                    <li>Driving without insurance</li>
                    <li>Driver found to be driving carelessly</li>
                  </ol>

                </div>

              </div>

            </div>
            <div class="col-md-6" id="edit_driver_penalty_reason_div" style="display: none">
              <div class="form-group">
                <!-- Label -->

                <!-- Input group -->
                <div class="input-group input-group-merge">
                  <div class="input-icon">
                    <i class="ri-user-line color-primary"></i>
                  </div>
                  <select id="edit_driver_penalty_reason" type="text" class="form-control" name="penalty_reason" autofocus required>
                    <option value="">Penalty points given for any of the reasons listed?</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="edit_driver_button">Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- edit claims -->
<form id="edit_claims_form" method="post" style="width: 100%">

  <div class="modal fade edit_claims_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Edit claims</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row g-gs" style="padding-top: 10px;padding-bottom: 10px">
            <div class="col-md-6" style="display: none">
              <label>id</label>
              <input id="edit_claims_id" type="text" class="form-control" name="id" autofocus required>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <!-- Label -->
                <label>
                  Which driver does this claim relate to?
                </label>
                <!-- Input group -->
                <div class="input-group input-group-merge">
                  <div class="input-icon">
                    <i class="ri-user-line color-primary"></i>
                  </div>
                  <input id="edit_claims_drivers" type="text" class="form-control" name="claims_drivers" autofocus required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <!-- Label -->
                <label>
                  Date of claim?
                </label>
                <!-- Input group -->
                <div class="input-group input-group-merge">
                  <div class="input-icon">
                    <i class="ri-user-line color-primary"></i>
                  </div>
                  <input id="edit_d_o_c" type="date" class="form-control" name="d_o_c" autofocus required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <!-- Label -->
                <label>
                  Type of claim
                </label>
                <!-- Input group -->
                <div class="input-group input-group-merge">
                  <div class="input-icon">
                    <i class="ri-user-line color-primary"></i>
                  </div>
                  <select id="edit_claim_type" type="text" class="form-control" name="claim_type" autofocus required>
                    <option value="">Please select the following</option>
                    <option value="Accidental damage">Accidental damage</option>
                    <option value="Fire">Fire</option>
                    <option value="Malicious damage as a result of theft">Malicious damage as a result of theft</option>
                    <option value="Personal accident">Personal accident</option>
                    <option value="Fire">Fire</option>
                    <option value="Personal effects">Personal effects</option>
                    <option value="Theft">Theft</option>
                    <option value="Third Party">Third Party</option>
                    <option value="Windscreen">Windscreen</option>
                    <option value="Vandalism">Vandalism</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <!-- Label -->
                <label>
                  Has this claim been settled?
                </label>
                <!-- Input group -->
                <div class="input-group input-group-merge">
                  <div class="input-icon">
                    <i class="ri-user-line color-primary"></i>
                  </div>
                  <select id="edit_claim_settled" type="text" class="form-control" name="claim_settled" autofocus required>
                    <option value="">Please select the following</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6" id="edit_claim_amount_div">
              <div class="form-group">
                <!-- Label -->
                <label>
                  Settlement amount?
                </label>
                <!-- Input group -->
                <div class="input-group input-group-merge">
                  <div class="input-icon">
                    <i class="ri-user-line color-primary"></i>
                  </div>
                  <input id="edit_claim_amount" type="text" class="form-control" name="claim_amount" autofocus required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="edit_claims_button">Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>



@endsection




@section('footer')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('js/jquery.accordion-form.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#accordion").accWizard({
      mode: 'wizard', //wizard, edit
      start: 1,
      autoButtonsNextClass: 'btn btn-primary float-right',
      autoButtonsPrevClass: 'btn btn-light',
      stepNumberClass: 'badge badge-pill badge-primary mr-1',
      onSubmit: function() {
        return true;
      },
      beforeNextStep: function(currentStep) {
        if (currentStep == 1) {
          if (!$("#car_detail_form").valid()) {
            return false;
          }
          //on create 
          if ($('#record_id').val() == '') {
            var type = 1;
            var record_id = '';
          }
          //updating 
          else {
            var type = 2;
            var record_id = $('#record_id').val();
          }
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{url(' / auto / temp_store ') }}',
            data: $("#car_detail_form").serialize() + "&type=" + type + '&record_id=' + record_id + '&step=' + currentStep,
            type: 'POST',
            dataType: "json",
            success: function(data) {
              if (data && Number.isInteger(data)) {
                $('#record_id').val(data)
                $('#duplicate_record_id').val(data)
              }
            }
          });
          return true;


        } else if (currentStep == 2) {
          if (!$("#driving_history_form").valid()) {
            return false;
          }
          //on create 
          if ($('#record_id').val() == '') {
            var type = 1;
            var record_id = '';
          }
          //updating 
          else {
            var type = 2;
            var record_id = $('#record_id').val();
          }
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{url(' / auto / temp_store ') }}',
            data: $("#driving_history_form").serialize() + "&type=" + type + '&record_id=' + record_id + '&step=' + currentStep,
            type: 'POST',
            dataType: "json",
            success: function(data) {
              if (data && Number.isInteger(data)) {
                $('#record_id').val(data)
                $('#duplicate_record_id').val(data)
              }
            }
          });
          if ($.fn.DataTable.isDataTable('#drivers')) {
            $('#drivers').DataTable().destroy();
          }
          drivers()
          return true;


        } else if (currentStep == 3) {
          if ($.fn.DataTable.isDataTable('#claims')) {
            $('#claims').DataTable().destroy();
          }
          claims()
          return true;
        } else if (currentStep == 4) {
          return true;
        }
        // $("#car_detail_form").submit();
        // return true;
      }
    });
    $("#car_detail_form").validate({
      rules: {
        reg_no: 'required',
        car_make: 'required',
        car_model: 'required',
        fuel_type: 'required',
        buisness_purpose: 'required',
      }
    });
  });
  $("#buisness_purpose").on('change', function() {
    if ($("#buisness_purpose").val() == 'Yes') {
      $("#buisness_purpose_div").show();
      $("#nonbuisness_purpose_div").hide();
      $('#business_type').val(null);
      $('#car_commute').val(null);
    } else if ($("#buisness_purpose").val() == 'No') {
      $("#buisness_purpose_div").hide();
      $("#nonbuisness_purpose_div").show();
      $('#business_type').val(null);
      $('#car_commute').val(null);
    } else {
      $("#buisness_purpose_div").hide();
      $("#nonbuisness_purpose_div").hide();
      $('#business_type').val(null);
      $('#car_commute').val(null);
    }

  });
  $("#penalty_points").on('change', function() {
    if ($("#penalty_points").val() == 'Yes') {
      $("#points_count_div").show();
      $("#points_details_div").show();
      $("#penalty_reason_div").show();
      $('#penalty_reason').val(null);
      $('#points_count').val(null);
    } else {
      $("#points_count_div").hide();
      $("#points_details_div").hide();
      $("#penalty_reason_div").hide();
      $('#points_count').val(null);
      $('#penalty_reason').val(null);

    }
  });
  $("#driver_penalty_points").on('change', function() {
    if ($("#driver_penalty_points").val() == 'Yes') {
      $("#driver_points_count_div").show();
      $("#driver_points_details_div").show();
      $("#driver_penalty_reason_div").show();
      $('#driver_penalty_reason').val(null);
      $('#driver_points_count').val(null);
    } else {
      $("#driver_points_count_div").hide();
      $("#driver_points_details_div").hide();
      $("#driver_penalty_reason_div").hide();
      $('#driver_points_count').val(null);
      $('#driver_penalty_reason').val(null);

    }
  });
  $("#edit_driver_penalty_points").on('change', function() {
    if ($("#edit_driver_penalty_points").val() == 'Yes') {
      $("#edit_driver_points_count_div").show();
      $("#edit_driver_points_details_div").show();
      $("#edit_driver_penalty_reason_div").show();
      $('#edit_driver_penalty_reason').val(null);
      $('#edit_driver_points_count').val(null);
    } else {
      $("#edit_driver_points_count_div").hide();
      $("#edit_driver_points_details_div").hide();
      $("#edit_driver_penalty_reason_div").hide();
      $('#edit_driver_points_count').val(null);
      $('#edit_driver_penalty_reason').val(null);

    }
  });

  function drivers() {
    $('#drivers').DataTable({

      processing: true,
      serverSide: true,
      dom: "",
      ajax: {
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: './auto/temp_drivers',
        method: 'Post',
        data: function(d) {
          d.id = $('#record_id').val();
        },
      },
      columns: [{
          "data": 'first_name',
          'name': 'first_name',
          searchable: true
        },
        {
          "data": 'd_o_b',
          'name': 'd_o_b',
          searchable: true
        },
        {
          "data": 'gender',
          'name': 'gender',
          searchable: true
        },
        {
          "data": 'driving_licence',
          'name': 'driving_licence',
          searchable: true
        },
        {
          "data": 'action',
          'name': 'action',
          searchable: true
        },

      ],
      "initComplete": function(settings, json) {
        $('.edit_driver').click(function() {
          $('#edit_driver_id').val($(this).attr('rel_id'));
          $('#edit_relation').val($(this).attr('rel_relation'));
          $('#edit_d_o_b').val($(this).attr('rel_d_o_b'));
          $('#edit_first_name').val($(this).attr('rel_first_name'));
          $('#edit_last_name').val($(this).attr('rel_last_name'));
          $('#edit_gender').val($(this).attr('rel_gender'));
          $('#edit_driver_driving_licence').val($(this).attr('rel_driving_licence'));
          $('#edit_driver_licence_period').val($(this).attr('rel_licence_period'));
          $('#edit_occupation').val($(this).attr('rel_occupation'));
          $('#edit_driver_penalty_points').val($(this).attr('rel_penalty_points'));
          if ($(this).attr('rel_penalty_points') == "Yes") {
            $('#edit_driver_points_count_div').show();
            $('#edit_driver_points_details_div').show();
            $('#edit_driver_penalty_reason_div').show();
          } else {
            $('#edit_driver_points_count_div').hide();
            $('#edit_driver_points_count').val(null);
            $('#edit_driver_points_details_div').hide();
            $('#edit_driver_penalty_reason_div').hide();
            $('#edit_driver_penalty_reason').val(null)
          }
          $('#edit_driver_points_count').val($(this).attr('rel_points_count'));
          $('#edit_driver_penalty_reason').val($(this).attr('rel_penalty_reason'));
        });
        $('.delete_driver').click(function() {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{url("/auto/temp_drivers/delete") }}' + '/' + $(this).attr('rel_id'),
            type: 'GET',
            dataType: "json",
            success: function(data) {
              if (data == 1) {
                if ($.fn.DataTable.isDataTable('#drivers')) {
                  $('#drivers').DataTable().destroy();
                }
                drivers();
                $('#add_driver_div').hide();
              }
            }
          });
        });
      }
    });
  }

  function claims() {
    $('#claims').DataTable({

      processing: true,
      serverSide: true,
      dom: "",
      ajax: {
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: './auto/temp_claims',
        method: 'Post',
        data: function(d) {
          d.id = $('#record_id').val();
        },
      },

      // ajax: {
      //     url:'/show/'+id,  
      //   },
      columns: [{
          "data": 'claim_type',
          'name': 'claim_type',
          searchable: true
        },
        {
          "data": 'd_o_c',
          'name': 'd_o_c',
          searchable: true
        },
        {
          "data": 'claims_drivers',
          'name': 'claims_drivers',
          searchable: true
        },
        {
          "data": 'claim_amount',
          'name': 'claim_amount',
          searchable: true
        },
        {
          "data": 'action',
          'name': 'action',
          searchable: true
        },
      ],
      "initComplete": function(settings, json) {
        $('.edit_claims').click(function() {
          $('#edit_claims_id').val($(this).attr('rel_id'));
          $('#edit_claims_drivers').val($(this).attr('rel_claims_drivers'));
          $('#edit_d_o_c').val($(this).attr('rel_d_o_c'));
          $('#edit_claim_type').val($(this).attr('rel_claim_type'));
          $('#edit_claim_settled').val($(this).attr('rel_claim_settled'));
          $('#edit_claim_amount').val($(this).attr('rel_claim_amount'));
        });
        $('.delete_claims').click(function() {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{url("/auto/temp_claims/delete") }}' + '/' + $(this).attr('rel_id'),
            type: 'GET',
            dataType: "json",
            success: function(data) {
              if (data == 1) {
                if ($.fn.DataTable.isDataTable('#claims')) {
                  $('#claims').DataTable().destroy();
                }
                claims();
                $('#add_claims_div').hide();
              }
            }
          });
        });
      }
    });
  }
  $('#add_driver_button').click(function() {
    if (!$("#add_driver_form").valid()) {
      return false;
    }
    //on create 
    if ($('#record_id').val() == '') {
      var type = 1;
      var record_id = '';
    }
    //updating 
    else {
      var type = 2;
      var record_id = $('#record_id').val();
    }
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '{{url(' / auto / temp_driver_store ') }}',
      data: $("#add_driver_form").serialize() + "&type=" + type + '&record_id=' + record_id,
      type: 'POST',
      dataType: "json",
      success: function(data) {
        if (data == 1) {
          if ($.fn.DataTable.isDataTable('#drivers')) {
            $('#drivers').DataTable().destroy();
          }
          drivers();
          $('#add_driver_div').hide();
        }
      }
    });
  });
  $('#edit_driver_button').click(function() {
    if (!$("#edit_driver_form").valid()) {
      return false;
    }
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '{{url(' / auto / temp_driver_edit ') }}',
      data: $("#edit_driver_form").serialize(),
      type: 'POST',
      dataType: "json",
      success: function(data) {
        if (data == 1) {
          if ($.fn.DataTable.isDataTable('#drivers')) {
            $('#drivers').DataTable().destroy();
          }
          drivers();
          $('.edit_driver_modal').modal('hide');
        }
      }
    });
  });
  $('#add_claim_button').click(function() {
    if (!$("#add_claims_form").valid()) {
      return false;
    }
    //on create 
    if ($('#record_id').val() == '') {
      var type = 1;
      var record_id = '';
    }
    //updating 
    else {
      var type = 2;
      var record_id = $('#record_id').val();
    }
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '{{url(' / auto / temp_claim_store ') }}',
      data: $("#add_claims_form").serialize() + "&type=" + type + '&record_id=' + record_id,
      type: 'POST',
      dataType: "json",
      success: function(data) {
        if (data == 1) {
          if ($.fn.DataTable.isDataTable('#claims')) {
            $('#claims').DataTable().destroy();
          }
          claims();
          $('#add_claims_div').hide();
        }
      }
    });
  });
  $('#edit_claims_button').click(function() {
    if (!$("#edit_claims_form").valid()) {
      return false;
    }
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '{{url(' / auto / temp_claims_edit ') }}',
      data: $("#edit_claims_form").serialize(),
      type: 'POST',
      dataType: "json",
      success: function(data) {
        if (data == 1) {
          if ($.fn.DataTable.isDataTable('#claims')) {
            $('#claims').DataTable().destroy();
          }
          claims();
          $('.edit_claims_modal').modal('hide');
        }
      }
    });
  });
  $('#add_driver_div_button').click(function() {
    $('#add_driver_div').show();
  });
  $('#add_claims_div_button').click(function() {
    $('#add_claims_div').show();
  });
  $("#claim_settled").on('change', function() {
    if ($("#claim_settled").val() == 'Yes') {
      $("#claim_amount_div").show();
      $('#claim_amount').val(null);
    } else {
      $("#claim_amount_div").hide();
      $('#claim_amount').val(null);
    }
  });
  $("#edit_claim_settled").on('change', function() {
    if ($("#edit_claim_settled").val() == 'Yes') {
      $("#edit_claim_amount_div").show();
      $('#edit_claim_amount').val(null);
    } else {
      $("#edit_claim_amount_div").hide();
      $('#edit_claim_amount').val(null);
    }
  });
</script>
@endsection