<?php namespace HACKson\Statuses;


use Laracasts\Commander\Events\EventGenerator;
use HACKson\Statuses\Events\StatusWasPublished;
use Laracasts\Presenter\PresentableTrait;

class Status extends \Eloquent {

    use EventGenerator, PresentableTrait;

    protected $fillable = ['body'];

    protected $presenter = 'HACKson\Statuses\StatusPresenter';


    public function user()
    {
        return $this->belongsTo('HACKson\Users\User');
    }

    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }

} 