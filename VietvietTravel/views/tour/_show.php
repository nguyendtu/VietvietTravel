<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
$tour = $model;
?>


<div class="thumbnail">
    <div class="row">
        <div class="col-md-5 hover-tour">
            <a href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]); ?>">
                <img src="images/<?php echo $tour->smallimg ?>" alt="Tour">
                <div class="tour-price price-top price-width">
                    <h4>Price from</h4>
                    <p class="price">$<?php echo $tour->price ?></p>
                    <p>per cabin</p>
                </div>
            </a>
            <p class="doc"></p>
            <p class="info"><em>Read more...</em></p>
        </div>
        <div class="col-md-7">
            <div class="caption">
                <h4><?php echo $tour->name ?></h4>
                <p><?php echo $tour->briefinfo ?></p>
                <ul class="tour-info inline text-right">
                    <li class="details">
                        <span class="glyphicon glyphicon-share-alt"></span> <a class="details" href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]); ?>">Details</a>
                    </li>
                    <li class="enquire" data-toggle="modal" data-target="#book_tour">
                        <span class="glyphicon glyphicon-share-alt"></span>
                        ENQUIRE NOW
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="book_tour" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">BOOKING FORM</h4>
                        <p class="note"><em>* indicates a required field</em></p>
                    </div>
                    <div class="modal-body">
                        <form id="order_form" class="form-horizontal" role="form" method="post">
                            <h4>Contact Information</h4>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="full_name">Full name</label>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="mr">Mr</option>
                                                <option value="ms">Ms</option>
                                                <option value="mrs">Mrs</option>
                                            </select>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="full_name" name="full-name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">*</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="email">Email</label>
                                <div class="col-md-7">
                                    <input type="text" id="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="confirm_email">Confirm e-mail</label>
                                <div class="col-md-7">
                                    <input type="text" id="confirm_email" name="confirm-email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="alternate_email">Alternate e-mail</label>
                                <div class="col-md-7">
                                    <input type="text" id="alternate_email" name="alternate-email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="phone">Phone</label>
                                <div class="col-md-7">
                                    <input type="text" id="phone" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="nationality">Nationality</label>
                                <div class="col-md-7">
                                    <select name="nationality" id="nationality" class="form-control">
                                        <option value="">Select your nationality</option>
                                        <option value="">Australia</option>
                                        <option value="">Vietnam</option>
                                    </select>
                                </div>
                            </div>
                            <h4>Itinerary Information</h4>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="no_adult">Nationality</label>
                                <div class="col-md-7">
                                    <select name="no-adult" id="no_adult" class="form-control">
                                        <option value="">1 person</option>
                                        <option value="">2 person</option>
                                        <option value="">3 person</option>
                                        <option value="">4 person</option>
                                        <option value="">5 person</option>
                                        <option value="">>> 5 person</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="full_name">List of member name</label>
                                <div class="col-md-7">
                                    <p><em>first name - middle name - last name</em></p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="mr">Mr</option>
                                                <option value="ms">Ms</option>
                                                <option value="mrs">Mrs</option>
                                            </select>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="full_name" name="full-name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">*</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="no_kid">Do you have any kids in your group?</label>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="radio" name="kid" id="no"> <label for="no">No</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" name="kid" id="yes"> <label for="yes">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">*</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="departure_date">Expected departure date</label>
                                <div class="col-md-7">
                                    <input type="date" id="departure_date" name="departure-date" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="accommodation_style">Accommodation Style</label>
                                <div class="col-md-7">
                                    <select name="accommodation-style" id="accommodation_style" class="form-control">
                                        <option value="">Standard class **</option>
                                        <option value="">First class ***</option>
                                        <option value="">Superior ****</option>
                                        <option value="">Deluxe *****</option>
                                        <option value="">Unsure</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="room_preference">Room Preference</label>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="single" id="single" class="form-control">
                                                <option value="">Single</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                                <option value="">Over</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="double" id="double" class="form-control">
                                                <option value="">Double</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                                <option value="">Over</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="twin" id="twin" class="form-control">
                                                <option value="">Twin</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                                <option value="">Over</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="visa_service">Do you need our v�a service?</label>
                                <div class="col-md-7">
                                    <select name="visa-serviceadult" id="visa_service" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="visa_service">What additional plans or ideas do you have for your itinerary?</label>
                                <div class="col-md-12">
                                    <textarea name="idea" id="idea" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <h4>Additional Information</h4>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="">Went with us before?</label>
                                <div class="col-md-7">
                                    <input type="checkbox"> Yes, i have travelled with TNK Travel before
                                </div>
                                <div class="col-md-3">
                                    *
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="">Receive our newsletters?</label>
                                <div class="col-md-7">
                                    <input type="checkbox"> Yes, i want to receive newsletters from TNK Travel
                                </div>
                                <div class="col-md-3">
                                    *
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="payment">You Preferred payment method</label>
                                <div class="col-md-7">
                                    <select name="payment" id="payment" class="form-control">
                                        <option value=""></option>
                                        <option value="">Credit card</option>
                                        <option value="">Bank transfer</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    *
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="">You know us through</label>
                                <div class="col-md-7">
                                    <select name="" id="" class="form-control">
                                        <option value=""></option>
                                        <option value="">Search google</option>
                                        <option value="">Newspaper</option>
                                        <option value="">Others</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    *
                                </div>
                            </div>
                            <div class="form-footer">
                                <button class="btn btn-primary">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>