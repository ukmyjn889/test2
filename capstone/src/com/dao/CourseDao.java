package com.dao;

import org.hibernate.Session;
import org.hibernate.Transaction;

import com.javabean.Course;
import com.util.HibernateSessionFactory;

public class CourseDao {
	public Object getCourseById(String cid){
		Session session=HibernateSessionFactory.getSession();
		return session.get(com.javabean.Course.class, cid);
	}
	public void saveCourse(Course course){
		Session session=HibernateSessionFactory.getSession();
		Transaction tr=session.beginTransaction();
		try{
		session.save(course);
		tr.commit();
		}catch(Exception e){
			tr.rollback();
		}
	}
}
