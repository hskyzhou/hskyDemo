import { Component, OnInit } from '@angular/core';

import { Work } from './work';

import { WorkService} from './work.service';

@Component({
	moduleId : module.id,
	selector: 'my-worklist',
	templateUrl : "worklist.component.html"
})

export class WorklistComponent implements OnInit{
	worklist : { [id: string] : any} = {};
	workListKeys : Array<string>;


	constructor(private workService : WorkService){

	}

	ngOnInit() : void{
		this.workService.getRecentWork().then(worklist => {
			// console.log(this.worklist);
			this.workListKeys = Object.keys(worklist);
			this.worklist = worklist;
		});
	}
} 