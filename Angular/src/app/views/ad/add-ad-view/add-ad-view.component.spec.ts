import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AddAdViewComponent } from './add-ad-view.component';

describe('AddAdViewComponent', () => {
  let component: AddAdViewComponent;
  let fixture: ComponentFixture<AddAdViewComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AddAdViewComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AddAdViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
