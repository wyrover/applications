<?php

namespace App\Http;

class Flash {

    /**
     * Create the session
     *
     * @param $title
     * @param $message
     * @param $level
     * @param string $key
     */
    public function create($title, $message, $level, $key = 'flash_message')
    {
        session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $level
        ]);
    }

    /**
     * Info style type message
     *
     * @param $title
     * @param $message
     */
    public function info($title, $message)
    {
        return $this->create($title, $message, 'info');
    }

    /**
     * Success style type message
     *
     * @param $title
     * @param $message
     */
    public function success($title, $message)
    {
        return $this->create($title, $message, 'success');
    }

    /**
     * Error style type message
     *
     * @param $title
     * @param $message
     */
    public function error($title, $message)
    {
        return $this->create($title, $message, 'error');
    }

    /**
     * Overlay type message
     *
     * @param $title
     * @param $message
     * @param string $level
     */
    public function overlay($title, $message, $level = 'success')
    {
        return $this->create($title, $message, $level, 'flash_message_overlay');
    }

}