import { Component } from '@angular/core';

import { Work } from './work';

import { WorkService} from './work.service';

@Component({
	moduleId : module.id,
	selector: 'my-add-work',
	templateUrl : "addwork.component.html"
})

export class AddWorkComponent{
	workname = "";
	worklist : Work[] = [];

	constructor(private workService : WorkService){

	}

	ngOnInit() : void{
		this.workService.getWork().then(workList => {
			this.worklist = workList;
		});
	}

	addWork() : void{
		let workinfo : Work = {
			name : this.workname
		};
		this.worklist.push(workinfo);
		this.workname = "";
		this.workService.addWork(workinfo);
	}


} 