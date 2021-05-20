/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.sql.Connection;
import java.util.ArrayList;
import javax.swing.JComboBox;
import junit.framework.TestCase;
import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author arambarri.oihana
 */
public class ModelTest extends TestCase {
    Model m1;
    Member m2;
    public ModelTest() {
        setUp();
    }
    @Override
    public void setUp() {
       m1=new Model();
       m2=new Member("342","34523","","","",false,0.0,0.0,""); 
    }

    /**
     * Test of addMember method, of class Model.
     */
    @Test
    public void testAddMember() {
        int expResult = 1;
        int result = Model.addMember(m2);
        assertEquals(expResult, result);

    }
 
    
}
