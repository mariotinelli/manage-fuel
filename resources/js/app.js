import './bootstrap';

import {Alpine, Livewire} from '../../vendor/livewire/livewire/dist/livewire.esm';

import intersect from '@alpinejs/intersect'

Alpine.plugin(intersect)

Livewire.start()
