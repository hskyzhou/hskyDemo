import { Component, OnInit } from '@angular/core';

import { Work } from './work';

import { WorkService} from './work.service';

@Component({
	moduleId : module.id,
	selector: 'my-worklist',
	templateUrl : "worklist.component.html"
})

export class WorklistComponent implements OnInit{
	worklist : Work[] = [];

	constructor(private workService : WorkService){

	}

	ngOnInit() : void{
		this.workService.getWork().then(worklist => this.worklist = worklist);
	}
} 