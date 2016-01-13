package com.service;

import com.dao.CourseDao;
import com.javabean.Course;

public class CourseService {
	CourseDao cd=new CourseDao();
	public boolean saveCourse(Course course){
		if(this.isCidDuplicated(course.getCid())){
			return false;
		}else{
		cd.saveCourse(course);
		return true;
		}
	}
	public boolean isCidDuplicated(String cid){
		if(cd.getCourseById(cid)==null){
			return false;
		}else{
			return true;
		}
	}
}
