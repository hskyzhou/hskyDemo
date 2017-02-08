import { Component, OnInit } from '@angular/core';

import { Work } from './work';

import { WorkService} from './work.service';

@Component({
	moduleId : module.id,
	selector: 'my-work',
	templateUrl : "work.component.html"
})

export class WorkComponent implements OnInit{
	worklist : Work[] = [];

	constructor(private workService : WorkService){

	}

	ngOnInit() : void{
		
	}
} 