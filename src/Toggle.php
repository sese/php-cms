<?php

class Toggle {
    function __construct(ToggleEventHandler $eventHandler) {
        $this->on = false;
        $this->eventHandler = $eventHandler;
    }

    function isOn() {
        return $this->on;
    }

    function toggle() {
        $this->on = !$this->on;
        if($this->on) {
            $this->eventHandler->handleOn();
        } else {
            $this->eventHandler->handleOff();
        }
    }
}
