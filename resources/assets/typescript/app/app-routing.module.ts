import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { WorklistComponent } from './worklist.component';
import { AddWorkComponent } from './addwork.component';
import { SendWeekWorkComponent } from './sendweekwork.component';

const routes : Routes = [
	{ path : '', redirectTo : '/work', pathMatch : 'full'},
	{ path : 'work', component : WorklistComponent},
	{ path : 'work/add', component : AddWorkComponent},
	{ path : 'work/sendweekwork', component : SendWeekWorkComponent},
];

@NgModule({
	imports : [ RouterModule.forRoot(routes) ],
	exports : [ RouterModule ]
})

export class AppRoutingModule{
	
}